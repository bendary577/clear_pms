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
        $diagnoses_array = [];
        $patients_array = Patient::with('diagnoses')->get();
        foreach($patients_array as $patient){
            if(count($patient->diagnoses) > 0){
                foreach($patient->diagnoses as $diagnose){
                    if (array_key_exists($diagnose->name, $diagnoses_array)) {
                        $diagnose_size = $diagnoses_array[$diagnose->name];
                        $diagnose_size++;
                        $diagnoses_array[$diagnose->name] = $diagnose_size;
                    }else{
                        $diagnoses_array[$diagnose->name] = 0;
                    }
                }
            }else{
                continue;
            }
        }
        $diagnoses_count = count($diagnoses_array);
        $diagnoses_percentage = [];
        $diagnoses_names = [];
        $counter = 0;
        foreach($diagnoses_array as $key => $value){
            $diagnose_percentage[$counter] = (($diagnoses_array[$key]/$diagnoses_count)*100);
            $diagnose_names[$counter] = $key;
            $counter++;
        }
        return Chartisan::build()
            ->labels(['bones','heart', 'diapetes'])
            ->dataset('sample', [ 23, 35, 34]);
    }
}