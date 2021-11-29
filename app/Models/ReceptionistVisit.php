<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceptionistVisit extends Model
{
    use HasFactory;

    protected $fillable = []; 

    public function appointment() 
    { 
      return $this->morphOne('App\Models\Appointment', 'visit');
    }

    public function receptionist()
    {  
        return $this->belongsTo(ReceptionistProfile::class);
    }

}
