<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{

    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receptionist_profile_id')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('another_phone')->nullable();
            $table->integer('age');
            $table->integer('code');
            $table->enum('gender',['male', 'female']);
            $table->date('birthdate');
            $table->date('attendance_date');
            $table->string('card_image_path')->nullable();
            $table->string('sheet_image_path')->nullable();
            $table->foreign('receptionist_profile_id')->references('id')->on('receptionist_profiles')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
