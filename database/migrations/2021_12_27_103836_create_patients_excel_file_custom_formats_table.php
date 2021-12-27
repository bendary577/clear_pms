<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsExcelFileCustomFormatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients_excel_file_custom_formats', function (Blueprint $table) {
            $table->id();
            $table->boolean('name')->nullable();
            $table->boolean('age')->nullable();
            $table->boolean('gender')->nullable();
            $table->boolean('code')->nullable();
            $table->boolean('birthdate')->nullable();
            $table->boolean('attendance_date')->nullable();
            $table->boolean('phone')->nullable();
            $table->boolean('another_phone')->nullable();
            $table->boolean('diagnose')->nullable();
            $table->boolean('medicine')->nullable();
            $table->boolean('receptionist_name')->nullable();
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
        Schema::dropIfExists('patients_excel_file_custom_formats');
    }
}
