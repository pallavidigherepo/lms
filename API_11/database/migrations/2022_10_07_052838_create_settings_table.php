<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid')->nullable();
            $table->string('institution_name')->nullable();
            $table->string('slogan')->nullable();
            $table->string('logo')->nullable();
            $table->string('website_url')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('alternate_phone_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->text('address')->nullable();
            $table->string('default_language')->nullable()->default('english');
            $table->string('mail_from_email')->nullable();
            $table->string('mail_from_name')->nullable();
            $table->string('mail_default_subject')->nullable();
            $table->string('mail_server')->nullable();
            $table->string('mail_login_name')->nullable();
            $table->string('mail_login_password')->nullable();
            $table->string('mail_default_template_name')->nullable();
            $table->json('mail_services')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
