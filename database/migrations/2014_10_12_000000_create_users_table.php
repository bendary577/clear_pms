<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_arabic');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('profile_type')->nullable();
            $table->unsignedInteger('profile_id')->nullable();
            $table->boolean('activated');
            $table->boolean('blocked');
            $table->string('about')->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar_path')->nullable();
            $table->string('forgot_password_code')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
