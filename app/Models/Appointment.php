<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $with = ['visit'];

    protected $fillable = [
        'date',
        'from',
        'to',
        'leaved_at',    
    ];

    public function visit()
    {
      return $this->morphTo();
    }

    public function getHasReceptionistVisitAttribute(){
        return $this->visit_type == 'App\Models\ReceptionistVisit';
    }

    public function getHasDoctorVisitAttribute(){
        return $this->visit_type == 'App\Models\DoctorVisit';
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function perscreption()
    {
        return $this->hasOne(Perscreption::class);
    }
}
