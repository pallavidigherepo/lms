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
        Schema::create('fee_student_discounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fee_id')->nullable();
            $table->unsignedBigInteger('fee_discount_id')->nullable();

            $table->foreign('fee_id')->references('id')->on('fees');
            $table->foreign('fee_discount_id')->references('id')->on('fee_discounts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_students');
    }
};
