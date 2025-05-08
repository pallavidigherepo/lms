<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_parents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parent_email')->nullable(true);
            $table->string('parent_password');
            $table->string('parent_aadhaar_number')->nullable(true);
            $table->boolean('is_parent_aadhaar_verified')->default(false);
            $table->string('mother_name')->nullable(true);
            $table->string('mother_email')->nullable(true);
            $table->string('mother_mobile')->nullable(true);
            $table->string('mother_qualification')->nullable(true);
            $table->string('mother_occupation')->nullable(true);
            $table->string('father_name')->nullable(true);
            $table->string('father_email')->nullable(true);
            $table->string('father_mobile')->nullable(true);
            $table->string('father_qualification')->nullable(true);
            $table->string('father_occupation')->nullable(true);

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
        Schema::dropIfExists('student_parents');
    }
}
