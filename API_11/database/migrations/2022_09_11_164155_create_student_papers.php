<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPapers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_papers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('generated_question_paper_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->date('attempted_on')->nullable();
            $table->string('total_time')->nullable();
            $table->string('total_time_taken')->nullable();
            $table->string('total_marks')->nullable();
            $table->string('total_marks_scored')->nullable();
            $table->json('solved_questions')->nullable();
            $table->string('unique_code')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('can_retest')->default(false);
            $table->date('show_result_on')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');

            $table->foreign('batch_id')->references('id')->on('batches');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('generated_question_paper_id')->references('id')->on('generated_question_papers');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('student_id')->references('id')->on('students');
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
        Schema::dropIfExists('student_papers');
    }
}
