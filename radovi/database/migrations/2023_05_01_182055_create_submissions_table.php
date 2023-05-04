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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            // User side
            $table->unsignedBigInteger('student_id')->default(0);
            $table->foreign('student_id')
                ->references('id')
                ->on('users');

            // Project side
            $table->unsignedBigInteger('task_id')->default(0);
            $table->foreign('task_id')
                ->references('id')
                ->on('tasks');

            $table->smallInteger('priority')->default(0);

            $table->boolean('valid')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submission');
    }
};
