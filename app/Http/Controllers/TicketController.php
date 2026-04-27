<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketReply;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /* ================================================================
       POST /tickets  —  Raise a new ticket
    ================================================================ */
    public function store(Request $request)
    {
        $request->validate([
            'item_master_id' => 'required|exists:item_masters,id',
            'title'          => 'required|string|max:255',
            'issue_type'     => 'required|in:damage,shortage,mismatch,delay,customs,other',
            'priority'       => 'required|in:low,medium,high,critical',
            'description'    => 'required|string|max:1000',
            'image'          => 'nullable|image|max:2048',
            'assignee'       => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'contact_name'   => 'required|string|max:255',
            'contact_email'  => 'required|email|max:255',
            'contact_phone'  => 'required|string|max:255',
            'equipment_status'        => 'required|in:operational,non-operational',
            'equipment_status_reason' => 'nullable|required_if:equipment_status,non-operational|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tickets', 'public');
        }

        do { $ref = 'TKT-' . rand(1000, 9999); }
        while (Ticket::where('ref', $ref)->exists());

        $ticket = Ticket::create([
            'ref'            => $ref,
            'item_master_id' => $request->item_master_id,
            'raised_by'      => auth()->id(),
            'title'          => $request->title,
            'issue_type'     => $request->issue_type,
            'priority'       => $request->priority,
            'description'    => $request->description,
            'image_path'     => $imagePath,
            'assignee'       => $request->assignee ?: null,
            'contact_person' => $request->contact_person ?: null,
            'contact_name'   => $request->contact_name,
            'contact_email'  => $request->contact_email,
            'contact_phone'  => $request->contact_phone,
            'status'         => 'open',
            'equipment_status'        => $request->equipment_status,
            'equipment_status_reason' => $request->equipment_status === 'non-operational' ? $request->equipment_status_reason : null,
        ]);

        // Automatically update the ItemMaster status to match the newly reported condition
        if ($ticket->item_master_id) {
            \App\Models\ItemMaster::where('id', $ticket->item_master_id)->update([
                'status' => $request->equipment_status,
                'status_reason' => $request->equipment_status === 'non-operational' ? $request->equipment_status_reason : null,
            ]);
        }

        $ticket->load(['item', 'raisedBy.location']);

        return response()->json([
            'success' => true,
            'ref'     => $ticket->ref,
            'id'      => $ticket->id,
            'ticket'  => $this->formatTicket($ticket),
        ]);
    }

    /* ================================================================
       GET /tickets/notifications
       - Admin : all tickets (newest 100, supports filters)
       - Others : only tickets they raised
       Query params:
         date_range : today | 7d | 30d | all  (default: all)
         location_id: <int>                    (admin-only)
         status     : open | closed | all      (default: all)
         priority   : low|medium|high|critical (optional)
       Returns locations list for admin filter dropdown.
    ================================================================ */
    public function notifications(\Illuminate\Http\Request $request)
    {
        $user      = auth()->user();
        $isAdmin   = $user->hasAnyRole(['Admin', 'Superadmin', 'Super Admin']);
        $dateRange = $request->query('date_range', 'all');
        $dateFrom  = $request->query('date_from');
        $dateTo    = $request->query('date_to');
        $locationId = $request->query('location_id', '');
        $status    = $request->query('status', 'all');
        $priority  = $request->query('priority', '');

        $query = Ticket::with(['item', 'raisedBy.location'])
                        ->withCount('replies')
                        ->withMax('replies', 'created_at')
                        ->latest();

        // ── Scope to user's own tickets if not admin ──────────────────
        if (! $isAdmin) {
            $query->where('raised_by', $user->id);
        }

        // ── Date range filter ──────────────────────────────────────────
        if ($dateRange === 'today') {
            $query->whereDate('tickets.created_at', today());
        } elseif ($dateRange === '7d') {
            $query->where('tickets.created_at', '>=', now()->subDays(7)->startOfDay());
        } elseif ($dateRange === '30d') {
            $query->where('tickets.created_at', '>=', now()->subDays(30)->startOfDay());
        } elseif ($dateRange === 'custom' && $dateFrom && $dateTo) {
            try {
                $query->whereBetween('tickets.created_at', [
                    \Carbon\Carbon::parse($dateFrom)->startOfDay(),
                    \Carbon\Carbon::parse($dateTo)->endOfDay()
                ]);
            } catch (\Exception $e) {
                // Invalid date format, skip filter
            }
        }
        // 'all' → no date filter

        // ── Location filter (admin only) ───────────────────────────────
        if ($isAdmin && $locationId !== '') {
            $query->whereHas('raisedBy', function ($q) use ($locationId) {
                $q->where('location_id', $locationId);
            });
        }

        // ── Status filter ──────────────────────────────────────────────
        if ($status !== 'all' && in_array($status, ['open', 'closed'])) {
            $query->where('status', $status);
        }

        // ── Priority filter ────────────────────────────────────────────
        if ($priority && in_array($priority, ['low', 'medium', 'high', 'critical'])) {
            $query->where('priority', $priority);
        }

        $tickets = $query->limit(100)->get();

        // ── Locations list for admin dropdown ──────────────────────────
        $locations = [];
        if ($isAdmin) {
            $locations = \App\Models\Location::orderBy('name')->get(['id', 'name']);
        }

        return response()->json([
            'total'     => $tickets->count(),
            'is_admin'  => $isAdmin,
            'tickets'   => $tickets->map(fn (\App\Models\Ticket $t) => $this->formatTicket($t)),
            'locations' => $locations,
        ]);
    }

    /* ================================================================
       GET /tickets/{id}/replies
       - Accessible only to Admin or the ticket raiser
    ================================================================ */
    public function getReplies(int $id)
    {
        $ticket = Ticket::with(['item', 'raisedBy.location'])->findOrFail($id);
        $user   = auth()->user();

        if (! $user->hasAnyRole(['Admin', 'Superadmin', 'Super Admin']) && $ticket->raised_by !== $user->id) {
            abort(403, 'Unauthorized');
        }

        $replies = $ticket->replies()
                          ->with('user.location')
                          ->oldest()
                          ->get();

        return response()->json([
            'ticket'  => $this->formatTicket($ticket),
            'replies' => $replies->map(fn ($r) => $this->formatReply($r, $user->id)),
        ]);
    }

    /* ================================================================
       POST /tickets/{id}/replies
       - Accessible only to Admin or the ticket raiser
    ================================================================ */
    public function addReply(Request $request, int $id)
    {
        $ticket = Ticket::findOrFail($id);
        $user   = auth()->user();

        if (! $user->hasAnyRole(['Super Admin', 'Location User', 'Location Users'])) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'message' => 'required|string|max:2000',
            'image'   => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('replies', 'public');
        }

        $reply = TicketReply::create([
            'ticket_id'  => $ticket->id,
            'user_id'    => $user->id,
            'message'    => $request->message,
            'image_path' => $imagePath,
        ]);

        $reply->load('user.location');

        return response()->json([
            'success' => true,
            'reply'   => $this->formatReply($reply, $user->id),
        ]);
    }

    /* ================================================================
       GET /tickets/{id}/reply-count
       Returns latest reply count for a specific ticket (for badge polling)
    ================================================================ */
    public function replyCount(int $id)
    {
        $ticket = Ticket::findOrFail($id);
        $user   = auth()->user();

        if (! $user->hasAnyRole(['Admin', 'Superadmin', 'Super Admin']) && $ticket->raised_by !== $user->id) {
            abort(403);
        }

        return response()->json(['count' => $ticket->replies()->count()]);
    }

    public function close(Request $request, $id)
    {
        $ticket = Ticket::with(['item', 'raisedBy.location'])->findOrFail($id);
        $user = auth()->user();

        if (!$user->hasAnyRole(['Super Admin', 'Location User', 'Location Users'])) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        if ($ticket->status === 'closed') {
            return response()->json(['success' => false, 'message' => 'Ticket is already closed']);
        }

        $ticket->status = 'closed';
        // Add a system reply when a ticket is closed
        $reply = new \App\Models\TicketReply();
        $reply->ticket_id = $ticket->id;
        $reply->user_id = $user->id;
        $reply->message = "System: Ticket marked as closed by " . $user->name . ".";
        
        $ticket->save();
        $reply->save();

        return response()->json([
            'success' => true,
            'ticket' => $this->formatTicket($ticket),
            'reply' => [
                'id'            => $reply->id,
                'message'       => $reply->message,
                'user_name'     => $user->name,
                'user_location' => $user->location?->name ?? 'Unknown',
                'is_admin'      => $user->hasAnyRole(['Admin', 'Superadmin', 'Super Admin']),
                'is_mine'       => true,
                'created_ago'   => 'just now',
            ]
        ]);
    }

    /* ================================================================
       PRIVATE HELPERS
    ================================================================ */
    private function formatTicket(Ticket $t): array
    {
        $colours = $this->priorityColours($t->priority);

        return [
            'id'                  => $t->id,
            'ref'                 => $t->ref,
            'title'               => $t->title,
            'issue_type'          => $t->issue_type,
            'priority'            => $t->priority,
            'status'              => $t->status,
            'description'         => $t->description,
            'contact_person'     => $t->contact_person ?? '',
            'contact_name'       => $t->contact_name ?? '',
            'contact_email'      => $t->contact_email ?? '',
            'contact_phone'      => $t->contact_phone ?? '',
            'image_url'           => $t->image_path ? asset('storage/' . $t->image_path) : null,
            'assignee'            => $t->assignee ?? 'Unassigned',
            'equipment'           => $t->item?->equipment ?? '',
            'code'                => $t->item?->code ?? '',
            'raised_by'           => $t->raisedBy->name ?? '',
            'raised_by_email'     => $t->raisedBy->email ?? '',
            'raised_by_location'  => $t->raisedBy->location?->name ?? 'No location',
            'replies_count'       => $t->replies_count ?? $t->replies()->count(),
            'equipment_status'    => $t->equipment_status ?? 'operational',
            'equipment_status_reason' => $t->equipment_status_reason ?? '',
            'latest_reply_at'     => $t->replies_max_created_at
                                       ? \Carbon\Carbon::parse($t->replies_max_created_at)->toISOString()
                                       : null,
            'created_at'          => $t->created_at->toISOString(),
            'created_ago'         => $t->created_at->diffForHumans(),
            'colours'             => $colours,
        ];
    }

    private function formatReply(TicketReply $r, int $myUserId): array
    {
        return [
            'id'            => $r->id,
            'user_id'       => $r->user_id,
            'user_name'     => $r->user->name ?? 'Unknown',
            'user_location' => $r->user->location?->name ?? 'No location',
            'is_admin'      => $r->user->hasAnyRole(['Admin', 'Superadmin', 'Super Admin']),
            'is_mine'       => $r->user_id === $myUserId,
            'message'       => $r->message,
            'image_url'     => $r->image_path ? asset('storage/' . $r->image_path) : null,
            'created_at'    => $r->created_at->toISOString(),
            'created_ago'   => $r->created_at->diffForHumans(),
        ];
    }

    private function priorityColours(string $priority): array
    {
        return [
            'low'      => ['bg' => '#f0fdf4', 'text' => '#16a34a', 'dot' => '#4ade80'],
            'medium'   => ['bg' => '#fffbeb', 'text' => '#d97706', 'dot' => '#fbbf24'],
            'high'     => ['bg' => '#fff7ed', 'text' => '#ea580c', 'dot' => '#fb923c'],
            'critical' => ['bg' => '#fef2f2', 'text' => '#dc2626', 'dot' => '#f87171'],
        ][$priority] ?? ['bg' => '#f8fafc', 'text' => '#64748b', 'dot' => '#94a3b8'];
    }
}
