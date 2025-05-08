<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSiblings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_siblings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('parent_id');
            $table->json('sibling_ids')->nullable();

            $table->foreign('student_id')->references('id')->on('students');
            //$table->foreign('sibling_id')->references('id')->on('students');
            $table->foreign('parent_id')->references('id')->on('student_parents');
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
        Schema::dropIfExists('student_siblings');
    }
}
