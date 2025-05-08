<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('enrollment_number')->nullable(true)->unique();
            $table->string('transfer_number')->nullable(true);
            $table->string('aadhaar')->nullable()->unique();
            $table->boolean('is_aadhaar_verified')->default(false);
            $table->unsignedBigInteger('parent_id')->nullable(true);
            $table->unsignedBigInteger('board_id')->nullable(true);
            $table->unsignedBigInteger('standard_id')->nullable(true);
            $table->unsignedBigInteger('language_id')->nullable(true);
            $table->unsignedBigInteger('batch_id')->nullable(true);
            $table->unsignedBigInteger('course_id')->nullable(true);
            // $table->string('email')->nullable(true);
            $table->string('password')->nullable(true);
            // $table->string('mobile')->nullable(true);
            // $table->string('alt_mobile')->nullable(true);
            $table->enum('gender', ['male', 'female', 'other'])->default('other')->nullable();
            $table->string('avatar')->nullable(true);
            $table->date('admission_date')->nullable(true);
            $table->date('dob')->nullable(true);
            $table->text('permanent_address')->nullable(true);
            $table->text('address')->nullable(true);
            $table->string('blood_group')->nullable();
            $table->string('medical_notes')->nullable();
            $table->string('category')->nullable(true);
            $table->string('caste')->nullable(true);
            $table->string('religion')->nullable(true);
            $table->string('mother_tongue_language')->nullable(true);
            $table->text('interests')->nullable(true);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('parent_id')->references('id')->on('student_parents');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('board_id')->references('id')->on('boards');
            $table->foreign('standard_id')->references('id')->on('standards');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('batch_id')->references('id')->on('batches');
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
        Schema::dropIfExists('students');
    }
}
