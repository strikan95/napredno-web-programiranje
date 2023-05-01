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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            // Project leader foreign key
            $table->unsignedBigInteger('project_leader_id')->default(0);
            $table->foreign('project_leader_id')->references('id')->on('users')->onDelete('cascade');

            // Columns
            $table->text('title');
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
        Schema::dropIfExists('projects');
    }
};
