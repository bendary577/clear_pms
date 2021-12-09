<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemMedicinesTable extends Migration
{

    public function up()
    {
        Schema::create('system_medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('code')->nullable();
            $table->timestamps();
        });

        DB::table('system_medicines')->insert([
            ['name' => 'هالونيز 5 مجم', 'code' => $this->generateMedicinesCode()],
            ['name' => 'ريسبادكس شراب', 'code' => $this->generateMedicinesCode()],
            ['name' => 'ابيكسدون0.5', 'code' => $this->generateMedicinesCode()],
            ['name' => 'ابيكسدون 1', 'code' => $this->generateMedicinesCode()],
            ['name' => 'ابيكسدون 2', 'code' => $this->generateMedicinesCode()],
            ['name' => 'ابيكسدون 3', 'code' => $this->generateMedicinesCode()],
            ['name' => 'ريسبيردال 4', 'code' => $this->generateMedicinesCode()],
            ['name' => 'نيورازين 100', 'code' => $this->generateMedicinesCode()],
            ['name' => 'تريبتزول 25', 'code' => $this->generateMedicinesCode()],
            ['name' => 'اميبرامين 25', 'code' => $this->generateMedicinesCode()],
            ['name' => 'تجريتول 200', 'code' => $this->generateMedicinesCode()],
            ['name' => 'تجريتول 400', 'code' => $this->generateMedicinesCode()],
            ['name' => 'أرباتج100', 'code' => $this->generateMedicinesCode()],
            ['name' => 'زاكلو100', 'code' => $this->generateMedicinesCode()],
            ['name' => 'كلوزابين 25 مجم', 'code' => $this->generateMedicinesCode()],
            ['name' => 'سوبرانيل 25', 'code' => $this->generateMedicinesCode()],
            ['name' => 'كلوميبرامين 75 مجم', 'code' => $this->generateMedicinesCode()],
            ['name' => 'كيوتابكس 25', 'code' => $this->generateMedicinesCode()],
            ['name' => 'كيوتابكس100', 'code' => $this->generateMedicinesCode()],
            ['name' => 'برولول 10', 'code' => $this->generateMedicinesCode()],
            ['name' => 'لوسترال 50', 'code' => $this->generateMedicinesCode()],
            ['name' => 'بروزاك 20', 'code' => $this->generateMedicinesCode()],
            ['name' => 'سيبرالكس 10', 'code' => $this->generateMedicinesCode()],
            ['name' => 'سيتالو برام 40 مجم', 'code' => $this->generateMedicinesCode()],
            ['name' => 'أولابكس 10', 'code' => $this->generateMedicinesCode()],
            ['name' => 'أولابكس 5', 'code' => $this->generateMedicinesCode()],
            ['name' => 'اولانزابين 7.5 مجم', 'code' => $this->generateMedicinesCode()],
            ['name' => 'أبيلفاى10', 'code' => $this->generateMedicinesCode()],
            ['name' => 'كرونو145', 'code' => $this->generateMedicinesCode()],
            ['name' => 'ديباكين200', 'code' => $this->generateMedicinesCode()],
            ['name' => 'أتوموكس10 مجم', 'code' => $this->generateMedicinesCode()],
            ['name' => 'أتوموكس 18 مجم', 'code' => $this->generateMedicinesCode()],
            ['name' => 'أتوموكس25 مجم', 'code' => $this->generateMedicinesCode()],
            ['name' => 'أتوموكس40', 'code' => $this->generateMedicinesCode()],
            ['name' => 'أتوموكس60', 'code' => $this->generateMedicinesCode()],
            ['name' => 'هلوبيردول 5', 'code' => $this->generateMedicinesCode()],
            ['name' => 'هالوبيردول ديبو 50 مجم', 'code' => $this->generateMedicinesCode()],
            ['name' => 'جوجينتول2', 'code' => $this->generateMedicinesCode()],
            ['name' => 'دوجماتيل50', 'code' => $this->generateMedicinesCode()],
            ['name' => 'دوجماتيل فورت200', 'code' => $this->generateMedicinesCode()],
            ['name' => 'فافرين50 مجم', 'code' => $this->generateMedicinesCode()],
            ['name' => 'دترونين شراب', 'code' => $this->generateMedicinesCode()],
            ['name' => 'بريانيل400 ', 'code' => $this->generateMedicinesCode()],
            ['name' => 'أكتينون2 مجم', 'code' => $this->generateMedicinesCode()],
            ['name' => 'كينوبريد5 مجم', 'code' => $this->generateMedicinesCode()],
            ['name' => 'اروكستين12.5 مجم', 'code' => $this->generateMedicinesCode()],
            ['name' => 'باروكستين 25 مجم', 'code' => $this->generateMedicinesCode()],
            ['name' => 'باروكستين 37.5 مجم', 'code' => $this->generateMedicinesCode()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('system_medicines');
    }

    public function generateMedicinesCode(){
        return rand(pow(10, 8-1), pow(10, 8)-1);
    }
}
