<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   public $table = "roles";
   
   public function getNameAttribute($value)
    {
        if (strtolower($value) === 'Admin') {
            return 'Super Admin';
        }

        return $value;
    }
}
