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
            // Foreign keys
            // User side
            $table->unsignedBigInteger('user_id')->default(0);
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            // Project side
            $table->unsignedBigInteger('project_id')->default(0);
            $table->foreign('project_id')
                ->references('id')
                ->on('projects');

            $table->text('description');

            // Other
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
