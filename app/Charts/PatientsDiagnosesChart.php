<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Diagnose;
use App\Models\SystemDiagnoses;
use App\Models\Patient;

class PatientsDiagnosesChart extends BaseChart
{

    public ?string $name = 'patients_diagnoses_chart';

    
    public function handler(Request $request): Chartisan
    {
        $diagnoses_array = array();
        $diagnoses = Diagnose::all();
        $diagnoses_count = count($diagnoses);

        foreach ($diagnoses as $diagnose){
            if(!isset($diagnoses_array[$diagnose->name])){ 
               $diagnoses_array[$diagnose->name] = 1;
            }else{
                $count =  $diagnoses_array[$diagnose->name];
                $count++;
                $diagnoses_array[$diagnose->name] = $count;
            }
        }

        return Chartisan::build()
        ->labels(array_keys($diagnoses_array))
        ->dataset('Registered Diagnoses', array_values($diagnoses_array));

    }
}