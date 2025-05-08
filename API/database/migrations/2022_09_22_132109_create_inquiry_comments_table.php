<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiryCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inquiry_id');
            $table->longText('comment')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('inquiry_followup_id')->nullable();
            $table->unsignedBigInteger('inquiry_status_id')->nullable();
            $table->unsignedBigInteger('inquiry_followup_type_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('parent_id')->references('id')->on('inquiry_comments');
            $table->foreign('inquiry_id')->references('id')->on('inquiries');
            $table->foreign('inquiry_followup_id')->references('id')->on('inquiry_followups');
            $table->foreign('inquiry_status_id')->references('id')->on('inquiry_statuses');
            $table->foreign('inquiry_followup_type_id')->references('id')->on('inquiry_followup_types');
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
        Schema::dropIfExists('inquiry_comments');
    }
}
