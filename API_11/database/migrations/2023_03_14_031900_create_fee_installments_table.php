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
        Schema::create('fee_installments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('standard_id')->nullable();
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->date('date_to_pay')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('standard_id')->references('id')->on('standards');
            $table->foreign('batch_id')->references('id')->on('batches');
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
        Schema::dropIfExists('fee_installments');
    }
};
