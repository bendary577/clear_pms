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
            $table->unsignedBigInteger('adults_clinic_id')->nullable();
            $table->unsignedBigInteger('children_clinic_id')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('another_phone')->nullable();
            $table->integer('age');
            $table->integer('code');
            $table->enum('gender',['male', 'female']);
            $table->date('birthdate')->nullable();
            $table->date('attendance_date');
            $table->string('card_image_path')->nullable();
            $table->string('sheet_image_path')->nullable();
            $table->string('receptionist_name')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('parent_name')->nullable();
            $table->string('parent_workplace')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_workplace')->nullable();
            $table->string('diagnose')->nullable();
            $table->string('medicine')->nullable();
            $table->string('clinic_type')->nullable();
            $table->foreign('receptionist_profile_id')->references('id')->on('receptionist_profiles')->onDelete('set null');
            $table->foreign('adults_clinic_id')->references('id')->on('adults_clinics')->onDelete('cascade');
            $table->foreign('children_clinic_id')->references('id')->on('children_clinics')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
