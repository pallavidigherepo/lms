<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unique_code')->unique()->nullable();
            $table->unsignedBigInteger('standard_id')->nullable();
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('inquiry_status_id')->nullable();
            $table->unsignedBigInteger('inquiry_source_id')->nullable();
            $table->text('inquiry_closing_reason')->nullable();
            $table->string('student_name')->nullable();
            $table->enum('student_gender', ['male', 'female', 'other'])->nullable();
            $table->date('student_dob')->nullable();
            $table->date('inquiry_date')->nullable();
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_mobile')->nullable();
            $table->integer('reminder_count')->nullable();
            $table->string('enquired_through')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->text('address')->nullable();

            $table->foreign('standard_id')->references('id')->on('standards');
            $table->foreign('batch_id')->references('id')->on('batches');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('inquiry_status_id')->references('id')->on('inquiry_statuses');
            $table->foreign('inquiry_source_id')->references('id')->on('inquiry_sources');
            $table->foreign('assigned_to')->references('id')->on('users');
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
        Schema::dropIfExists('inquiries');
    }
}
