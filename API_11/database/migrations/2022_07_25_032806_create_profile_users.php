<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('alt_email')->nullable(true);
            $table->string('mobile')->nullable(true);
            $table->string('alt_mobile')->nullable(true);
            $table->text('address')->nullable(true);
            $table->text('alt_address')->nullable(true);
            $table->enum('gender', ['male', 'female', 'other']);
            $table->text('qualification')->nullable(true);
            $table->string('avatar')->nullable(true);
            $table->string('designation')->nullable();

            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('profile_users');
    }
}
