<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportingPatientsSystemConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importing_patients_system_configurations', function (Blueprint $table) {
            $table->id();
            $table->enum('excel_policy', ['predefined', 'custom']);
            $table->enum('code_policy', ['random', 'custom', 'sequential']);
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
        Schema::dropIfExists('importing_patients_system_configurations');
    }
}
