<?php

namespace App\Imports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;

class PatientsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Patient([
            'name'  => $row['name'],
            'phone' => $row['phone'],
            'age' => $row['age'],
            'code' => $row['code'],
            'gender' => $row['gender'],
            'birthdate' => $row['birthdate'],
            'attendance_date' => $row['attendance_date'],
        ]);
    }
}
