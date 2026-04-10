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
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('description');
        });

        Schema::table('ticket_replies', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('message');
        });
    }

    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });

        Schema::table('ticket_replies', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
};
