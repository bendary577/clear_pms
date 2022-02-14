<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdultsClinicsTable extends Migration
{

    public function up()
    {
        Schema::create('adults_clinics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('adults_clinics')->insert([
            ['name' => 'adults_clinic'],
        ]);

    }

    public function down()
    {
        Schema::dropIfExists('adults_clinics');
    }
}
