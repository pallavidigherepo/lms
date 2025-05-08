<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneratedQuestionPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generated_question_papers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_auto')->default(true)->nullable();
            $table->json('generated_questions')->nullable();

            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('chapter_id')->nullable();
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->unsignedBigInteger('difficulty_level_id')->nullable();
            $table->unsignedBigInteger('template_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('chapter_id')->references('parent_id')->on('subjects');
            $table->foreign('difficulty_level_id')->references('id')->on('question_difficulty_levels');
            $table->foreign('template_id')->references('id')->on('templates');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('generated_question_papers');
    }
}
