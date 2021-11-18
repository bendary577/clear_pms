<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ElasticScoutDriverPlus\Searchable;

class Patient extends Model
{
    use HasFactory;
    //use Searchable;
    
    protected $fillable = [
        'name',
        'phone',
        'age',
        'code',
        'gender',
        'birthdate',
        'attendance_date',
        'card_image_path',
        'sheet_image_path',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function generateCode(){
        return rand(pow(10, 8-1), pow(10, 8)-1);
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnose::class);
    }

    public function receptionistProfile()
    {
        return $this->belongsTo(ReceptionistProfile::class);
    }

}
