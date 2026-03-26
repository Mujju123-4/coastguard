<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location; // Assuming Location model is in the same namespace

class ItemMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'code',
        'serial_no',
        'equipment',
        'qty',
        'uom',
        'remarks',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
