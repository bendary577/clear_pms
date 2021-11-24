<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class PatientsAgesChart extends BaseChart
{

    public ?string $name = 'patients_ages_chart';


    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['First', 'Second', 'Third'])
            ->dataset('AGES', [1, 2, 3]);
    }
}