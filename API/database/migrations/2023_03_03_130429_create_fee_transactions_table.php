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
        Schema::create('fee_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fee_id')->nullable();
            $table->unsignedBigInteger('fee_structure_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('amount')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('uid')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('fee_id')->references('id')->on('fees');
            $table->foreign('fee_structure_id')->references('id')->on('fee_structures');
            $table->foreign('parent_id')->references('id')->on('student_parents');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_transactions');
    }
};
