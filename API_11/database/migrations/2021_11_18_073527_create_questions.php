<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->longText('question')->nullable();
            $table->longText('description')->nullable();
            $table->longText('note')->nullable();
            $table->integer('marks')->nullable();
            $table->integer('negative_marks')->nullable();
            $table->integer('expected_time')->nullable();

            //All the relational fields will come after this.
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('board_id')->nullable();
            $table->unsignedBigInteger('standard_id')->nullable();
            $table->unsignedBigInteger('difficulty_level_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();

            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('chapter_id')->nullable();
            $table->unsignedBigInteger('topic_id')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('parent_id')->references('id')->on('questions');
            $table->foreign('board_id')->references('id')->on('boards');
            $table->foreign('standard_id')->references('id')->on('standards');

            $table->foreign('difficulty_level_id')->references('id')->on('question_difficulty_levels');
            $table->foreign('type_id')->references('id')->on('question_types');
            $table->foreign('language_id')->references('id')->on('languages');

            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('chapter_id')->references('parent_id')->on('subjects');
            // $table->foreign('topic_id')->references('parent_id')->on('subjects');

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
