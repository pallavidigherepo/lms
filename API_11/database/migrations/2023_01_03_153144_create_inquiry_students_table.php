<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiryStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inquiry_id');
            $table->unsignedBigInteger('student_id');

            $table->foreign('inquiry_id')->references('id')->on('inquiries');
            $table->foreign('student_id')->references('id')->on('students');

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
        Schema::dropIfExists('inquiry_students');
    }
}
