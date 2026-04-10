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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->unique();                        // e.g. TKT-1042
            $table->foreignId('item_master_id')->constrained()->onDelete('cascade');
            $table->foreignId('raised_by')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->string('issue_type')->default('damage');        // damage|shortage|mismatch|delay|customs|other
            $table->string('priority')->default('medium');          // low|medium|high|critical
            $table->text('description');
            $table->string('assignee')->nullable();
            $table->string('status')->default('open');              // open|in_progress|resolved|closed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
