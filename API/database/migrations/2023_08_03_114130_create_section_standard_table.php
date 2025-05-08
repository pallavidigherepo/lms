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
        Schema::create('section_standard', function (Blueprint $table) {
            $table->id();
            $table->foreignId('standard_id')->nullable()->references('id')->on('standards')->onDelete('cascade');
            $table->foreignId('section_id')->nullable()->references('id')->on('sections')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_standard');
    }
};
