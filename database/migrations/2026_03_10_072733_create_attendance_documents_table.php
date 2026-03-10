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
        Schema::create('attendance_documents', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('attendance_id')
                ->constrained('attendance_sessions')
                ->cascadeOnDelete();

            $table->string('file_path');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_documents');
    }
};
