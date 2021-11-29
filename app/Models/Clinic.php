<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'examination_price',
        'follow_up_price',
        'available_from',
        'available_to',
        'department'
    ];


    public function doctorProfile()
    {
        return $this->belongsTo(DoctorProfile::class);
    }

    public function doctorVisits()
    {
        return $this->hasMany(DoctorVisit::class);
    }

    public function currentDoctorVisits()
    {
        return $this->hasMany(DoctorVisit::class)
                    ->whereHas('appointment', function($query) {
                        $query->where('visit_type', 'App\Models\DoctorVisit')
                              ->where('leaved_at', null);
                    })->get();
    }
}
