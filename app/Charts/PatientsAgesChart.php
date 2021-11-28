<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientsAgesChart extends BaseChart
{

    public ?string $name = 'patients_ages_chart';


    public function handler(Request $request): Chartisan
    {
        $patients = Patient::all();
        $year_to_fifteen_years_ages = [];
        $fifteen_to_twenty_five_years_ages = [];
        $twenty_five_to_forty_five_years = [];
        $forty_five_to_sixty_five_years = [];
        $sixty_five_to_ninty_years = [];
        $more_than_ninty_years = [];
        foreach($patients as $patient){
            if($patient->age >= 1 && $patient->age <= 15){
                array_push($year_to_fifteen_years_ages, $patient->age);
            }else if($patient->age >= 16 && $patient->age <= 25){
                array_push($fifteen_to_twenty_five_years_ages, $patient->age);
            }else if($patient->age >= 26 && $patient->age <= 45){
                array_push($twenty_five_to_forty_five_years, $patient->age);
            }else if($patient->age >= 46 && $patient->age <= 65){
                array_push($forty_five_to_sixty_five_years, $patient->age);
            }else if($patient->age >= 66 && $patient->age <= 90){
                array_push($sixty_five_to_ninty_years, $patient->age);
            }else{
                array_push($more_than_ninty_years, $patient->age);
            }
        }
        return Chartisan::build()
            ->labels(['from 1 year to 15', 'from 16 to 25', 'from 26 to 45', 'from 46 to 65', 'from 66 to 90', 'more than 90'])
            ->dataset('AGES', [ count($year_to_fifteen_years_ages), 
                                count($fifteen_to_twenty_five_years_ages),
                                count($twenty_five_to_forty_five_years),
                                count($forty_five_to_sixty_five_years),
                                count($sixty_five_to_ninty_years),
                                count($more_than_ninty_years)
                            ]);
    }
}