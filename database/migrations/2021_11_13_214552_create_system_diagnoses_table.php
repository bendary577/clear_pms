<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemDiagnosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_diagnoses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('system_diagnoses')->insert([
            ['name' => 'تشتت الانتباه ADD'],
            ['name' => 'فرط الحركه Hyperactive'],
            ['name' => 'الاندفاعية Impulsivity'],
            ['name' => 'فرط حركة وتشتت فى الإنتباة  ADHD'],
            ['name' => 'صعوبات تعلم learning disabilities'],
            ['name' => 'التأخر العقلى MR'],
            ['name' => 'التوحد Autism'],
            ['name' => 'متلازمة داون Down Syndrome'],
            ['name' => 'التلعثم  Stuttering'],
            ['name' => 'إضطراب العناد الشارد ODD'],
            ['name' => 'الجنوح Conduct'],
            ['name' => 'التنمر Bullying'],
            ['name' => 'الإكتئاب  Depression'],
            ['name' => 'القلق Anxiety'],
            ['name' => 'الوسواس قهرى OCD'],
            ['name' => 'ثنائى القطب Bipolar'],
            ['name' => 'الشخصية الحدية Borderline'],
            ['name' => 'الهستيريا Hysteria'],
            ['name' => 'اضطراب كرب ما بعد الصدمة PTSD'],
            ['name' => 'العنف الأسرى  Domestic Violence'],
            ['name' => 'الاعتداء الجنسى Sexual Abuse'],
            ['name' => 'الفصام Schizophrenia'],
            ['name' => 'تقلب مزاجى Mood swing'],
            ['name' => 'رهاب اجتماعى Social Phobia'],
            ['name' => 'عدم التكيف Mal Adjustment'],
            ['name' => 'اضطرابات شخصية Personality disorder'],
            ['name' => 'فصام وجدانى Schizo affective'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_diagnoses');
    }
}
