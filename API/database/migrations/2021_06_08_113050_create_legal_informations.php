<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalInformations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_informations', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->json('content');
                $table->json('disclaimer')->nullable();
                $table->boolean('in_library')->default(0);
                $table->unsignedBigInteger('legal_information_type_id');
                $table->unsignedBigInteger('created_by');
                $table->unsignedBigInteger('updated_by');
                $table->timestamps();
                $table->softDeletes();
      
                $table->foreign('legal_information_type_id')->references('id')->on('legal_information_types');
                $table->foreign('created_by')->references('id')->on('users');
                $table->foreign('updated_by')->references('id')->on('users');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legal_informations');
    }
}
