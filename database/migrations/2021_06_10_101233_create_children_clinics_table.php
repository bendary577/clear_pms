<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenClinicsTable extends Migration
{

    public function up()
    {
        Schema::create('children_clinics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('children_clinics')->insert([
            ['name' => 'children_clinic'],
        ]);
    }


    public function down()
    {
        Schema::dropIfExists('children_clinics');
    }
}
