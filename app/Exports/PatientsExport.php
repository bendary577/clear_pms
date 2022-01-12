<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;

class PatientsExport implements FromCollection
{

    public function collection()
    {
        $patients = Patient::all();
        return $patients;
    }
}
