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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Task title
            $table->text('description')->nullable(); // Task description
            $table->foreignIdFor(\App\Models\Category::class)->constrained()->onDelete('cascade'); // Task category
            $table->foreignIdFor(\App\Models\Priorities::class)->constrained()->onDelete('cascade'); // Task priority
            $table->enum('status', ['pending', 'in-progress', 'completed'])->default('pending'); // Task status
            $table->timestamp('deadline')->nullable(); // Task deadline
            $table->foreignIdFor(\App\Models\User::class)->constrained()->onDelete('cascade'); // Task assignee
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
