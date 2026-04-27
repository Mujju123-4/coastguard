<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
<<<<<<< HEAD
        'ref', 'item_master_id', 'raised_by', 'contact_person',
        'contact_name', 'contact_email', 'contact_phone',
=======
        'ref', 'item_master_id', 'raised_by',
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
        'title', 'issue_type', 'priority',
        'description', 'image_path', 'assignee', 'status',
    ];

    public function item(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ItemMaster::class, 'item_master_id');
    }

    public function raisedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'raised_by');
    }

    public function replies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TicketReply::class);
    }
}
