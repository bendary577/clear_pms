<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorVisit extends Model
{
    use HasFactory;

    protected $fillable = ['reason']; 

    public function appointment() 
    { 
      return $this->morphOne('App\Models\Appointment', 'visit');
    }

    public function clinic()
    {  
        return $this->belongsTo(Clinic::class);
    }

}
