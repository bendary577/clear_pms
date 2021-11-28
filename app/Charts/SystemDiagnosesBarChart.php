<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class SystemDiagnosesBarChart extends BaseChart
{
    public ?string $name = 'system_diagnoses_bar_chart';


    public function handler(Request $request): Chartisan
    {
       /*
        $patients = Patient::all();
        $diagnoses_sizes_array = array();
        foreach($patients as $patient){
            foreach($patient->diagnoses as $diagnose){
                if(array_key_exists($diagnose->name, $diagnoses_sizes_array)){
                    $diagnose_size = $diagnoses_sizes_array[$diagnose->name];
                    $diagnose_size++;
                    $diagnoses_sizes_array[$diagnose->name] = $diagnose_size;
                }else{
                    $diagnoses_sizes_array[$diagnose->name] = 0;
                }
            }
        }
        */
        return Chartisan::build()
            ->labels(['from 1 year to 15', 'from 16 to 25', 'from 26 to 45', 'from 46 to 65', 'from 66 to 90', 'more than 90'])
            ->dataset('AGES', [1,2,3,4,5,6]);
    }
}