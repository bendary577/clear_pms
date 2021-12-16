<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'work_place',
        'relative_relation',
        'medical_history',
        'notes'
    ];
}
