<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Clinic;

class ClinicsDepartmentsPieChart extends BaseChart
{
    public ?string $name = 'clinics_department_pie_chart';

    public function handler(Request $request): Chartisan
    {
        $clinics_count = Clinic::all()->count();
        $adult_clinics_count = Clinic::where('department','=','adults')->count();
        $children_clinics_count = Clinic::where('department','=','children')->count();

        $adult_clinics_percentage = round(($adult_clinics_count/$clinics_count)*100);
        $children_clinics_percentage = round(($children_clinics_count/$clinics_count)*100);

        return Chartisan::build()
            ->labels([$adult_clinics_percentage.' % '.'Adults', $children_clinics_percentage.' % '.'Children'])
            ->dataset('GENDER', [$adult_clinics_percentage, $children_clinics_percentage]);
    }
}