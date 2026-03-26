<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $permissions = [
            'create item masters',
            'edit item masters',
            'delete item masters',
        ];

        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $permission]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $permissions = [
            'create item masters',
            'edit item masters',
            'delete item masters',
        ];

        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::where('name', $permission)->delete();
        }
    }
};
