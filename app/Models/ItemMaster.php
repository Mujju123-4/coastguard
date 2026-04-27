<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id', 'code', 'serial_no',
        'equipment', 'qty', 'uom', 'remarks',
<<<<<<< HEAD
        'status', 'status_reason','serviced_date'
=======
        'status', 'status_reason',
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
    ];

    public function location(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function tickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Ticket::class, 'item_master_id');
    }
}
