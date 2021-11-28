<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientsGendersChart extends BaseChart
{
    public ?string $name = 'patients_genders_chart';

    public function handler(Request $request): Chartisan
    {
        $patients_count = Patient::all()->count();
        $men_patients_count = Patient::where('gender', '=', 'male')->count();
        $women_patients_count = Patient::where('gender', '=', 'female')->count();

        $men_patients_percentage = round(($men_patients_count/$patients_count)*100);
        $women_patients_percentage = round(($women_patients_count/$patients_count)*100);

        return Chartisan::build()
            ->labels([$men_patients_percentage.' % '.'Male', $women_patients_percentage.' % '.'Female'])
            ->dataset('GENDER', [$men_patients_percentage, $women_patients_percentage]);
    }
}