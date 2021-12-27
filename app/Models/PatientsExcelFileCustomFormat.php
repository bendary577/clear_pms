<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientsExcelFileCustomFormat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'code',
        'birthdate',
        'attendance_date',
        'phone',
        'another_phone',
        'diagnose',
        'medicine',
        'receptionist_name',
        'created_at'
    ];
}
