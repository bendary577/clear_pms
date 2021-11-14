<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('system_medicines')->insert([
            ['name' => 'هالونيز 5 مجم'],
            ['name' => 'ريسبادكس شراب'],
            ['name' => 'ابيكسدون0.5'],
            ['name' => 'ابيكسدون 1'],
            ['name' => 'ابيكسدون 2'],
            ['name' => 'ابيكسدون 3'],
            ['name' => 'ريسبيردال 4'],
            ['name' => 'نيورازين 100'],
            ['name' => 'تريبتزول 25'],
            ['name' => 'اميبرامين 25'],
            ['name' => 'تجريتول 200'],
            ['name' => 'تجريتول 400'],
            ['name' => 'أرباتج100'],
            ['name' => 'زاكلو100'],
            ['name' => 'كلوزابين 25 مجم'],
            ['name' => 'سوبرانيل 25'],
            ['name' => 'كلوميبرامين 75 مجم'],
            ['name' => 'كيوتابكس 25'],
            ['name' => 'كيوتابكس100'],
            ['name' => 'برولول 10'],
            ['name' => 'لوسترال 50'],
            ['name' => 'بروزاك 20'],
            ['name' => 'سيبرالكس 10'],
            ['name' => 'سيتالو برام 40 مجم'],
            ['name' => 'أولابكس 10'],
            ['name' => 'أولابكس 5'],
            ['name' => 'اولانزابين 7.5 مجم'],
            ['name' => 'أبيلفاى10'],
            ['name' => 'كرونو145'],
            ['name' => 'ديباكين200'],
            ['name' => 'أتوموكس10 مجم'],
            ['name' => 'أتوموكس 18 مجم'],
            ['name' => 'أتوموكس25 مجم'],
            ['name' => 'أتوموكس40'],
            ['name' => 'أتوموكس60'],
            ['name' => 'هلوبيردول 5'],
            ['name' => 'هالوبيردول ديبو 50 مجم'],
            ['name' => 'جوجينتول2'],
            ['name' => 'دوجماتيل50'],
            ['name' => 'دوجماتيل فورت200'],
            ['name' => 'فافرين50 مجم'],
            ['name' => 'دترونين شراب'],
            ['name' => 'بريانيل400 '],
            ['name' => 'أكتينون2 مجم'],
            ['name' => 'كينوبريد5 مجم'],
            ['name' => 'اروكستين12.5 مجم'],
            ['name' => 'باروكستين 25 مجم'],
            ['name' => 'باروكستين 37.5 مجم'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_medicines');
    }
}
