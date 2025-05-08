<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->json('description')->nullable();
            $table->json('label');
            $table->string('icon', 250)->nullable();

            $table->unsignedBigInteger('board_id')->nullable();
            $table->unsignedBigInteger('standard_id')->nullable();

            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');

            $table->timestamps();
            $table->softDeletes();

            //$table->foreign('board_id')->references('id')->on('boards');
           // $table->foreign('standard_id')->references('id')->on('standards');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('parent_id')->references('id')->on('subjects');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
