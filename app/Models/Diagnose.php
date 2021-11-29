<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnose extends Model
{
    use HasFactory;

    protected $table = 'diagnoses';
    
    protected $fillable = [
        'name',
        'description',
        'treatment_protocol'
    ];

    public function perscreption()
    {
        return $this->belongsTo(Perscreption::class);
    }

}
