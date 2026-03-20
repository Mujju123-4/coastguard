<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notice;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::latest()->get();
        return view('notices.index', compact('notices'));
    }

    public function create()
    {
        return view('notices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'category' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,jpg,png,doc,docx|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->only(['title', 'content', 'category', 'is_active']);
        $data['published_at'] = $request->published_at ?? now();

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('notices', 'public');
        }

        Notice::create($data);

        return redirect()->route('notices.index')->with('success', 'Notice created successfully.');
    }

    public function edit(Notice $notice)
    {
        return view('notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'category' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,jpg,png,doc,docx|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->only(['title', 'content', 'category', 'is_active']);
        $data['published_at'] = $request->published_at ?? $notice->published_at;

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($notice->file_path) {
                Storage::disk('public')->delete($notice->file_path);
            }
            $data['file_path'] = $request->file('file')->store('notices', 'public');
        }

        $notice->update($data);

        return redirect()->route('notices.index')->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice)
    {
        if ($notice->file_path) {
            Storage::disk('public')->delete($notice->file_path);
        }
        $notice->delete();
        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully.');
    }
}
