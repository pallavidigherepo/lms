<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalInformationTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_information_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('skype_id', 50)->nullable();
            $table->string('language', 10)->nullable()->default('en');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('verification_email_sent_at')->nullable();
            $table->string('password')->nullable();
            $table->string('api_token')->unique()->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('legal_information_types');
    }
}
