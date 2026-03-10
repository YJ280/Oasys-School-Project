<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendance_sessions', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('class_id')
                ->constrained('classes')
                ->cascadeOnDelete();

            $table->foreignUuid('teacher_id')
                ->constrained('teachers')
                ->cascadeOnDelete();

            $table->date('date');

            $table->text('description')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_sessions');
    }
};
