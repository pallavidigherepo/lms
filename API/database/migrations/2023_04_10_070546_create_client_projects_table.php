<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_projects', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('site_name');
            $table->string('site_url');
            $table->string('site_logo_path');
            $table->string('storage_absolute_path');
            $table->string("connection");
            $table->string("host");
            $table->string("port");
            $table->string("database");
            $table->string("username");
            $table->string("password");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_projects');
    }
};
