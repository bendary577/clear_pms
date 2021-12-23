<?php

namespace App\Imports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;
use Illuminate\Contracts\Queue\ShouldQueue;
//use Maatwebsite\Excel\Concerns\WithChunkReading;
//use Maatwebsite\Excel\Concerns\WithBatchInserts;

//WithBatchInserts, WithChunkReading

class PatientsImport implements ToModel, WithHeadingRow, ShouldQueue
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

    /*
    public function batchSize(): int
    {
        return 1500;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
    */

}
