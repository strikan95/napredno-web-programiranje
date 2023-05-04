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
            // Professor foreign key
            $table->unsignedBigInteger('professor_id')->default(0);
            $table->foreign('professor_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('student_id')->nullable()->default(null);
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');

            // Columns
            $table->text('title');

            $table->string('study_type')->nullable();

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
