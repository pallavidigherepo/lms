<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('board_id');
            $table->unsignedBigInteger('standard_id');
            $table->integer('total_marks');
            $table->string('duration');
            $table->boolean('has_section');
            $table->boolean('is_active')->default(true);
            $table->json('sections')->default(true)->nullable();
            $table->integer('total_questions')->default(true)->nullable();
            $table->integer('compulsory_questions')->default(true)->nullable();
            $table->unsignedBigInteger('type_id')->default(true)->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->softDeletes();

            $table->foreign('board_id')->references('id')->on('boards');
            $table->foreign('standard_id')->references('id')->on('standards');
            $table->foreign('type_id')->references('id')->on('question_types');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templates');
    }
}
