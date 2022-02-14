<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class Patient extends Model
{
    use HasFactory, ElasticquentTrait;
    
    protected $fillable = [
        'name',
        'phone',
        'another_phone',
        'age',
        'code',
        'gender',
        'birthdate',
        'attendance_date',
        'card_image_path',
        'sheet_image_path',
        'city',
        'province',
        'parent_name',
        'parent_workplace',
        'mother_name',
        'mother_workplace',
        'receptionist_name',
        'diagnose',
        'medicine',
        'clinic_type'
    ];

    protected $mappingProperties = array(
        'name' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
        'clinic_type' => [
            'type' => 'text',
            "analyzer" => "standard",
          ],
      );

    public static function boot()
    {
        parent::boot();
        static::deleting(function($patient) { 
            $patient->appointments()->delete();
            $patient->files()->delete();
        });
    }  

    public function relatives()
    {
        return $this->hasMany(Relative::class);
    }

    public function appointments() 
    {
        return $this->hasMany(Appointment::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function receptionistProfile()
    {
        return $this->belongsTo(ReceptionistProfile::class);
    }

    /* ------------------- not recommended behaviour ---------------------------- */
    public function adultsClinic()
    {
        return $this->belongsTo(AdultsClinic::class);
    }

    public function childrenClinic()
    {
        return $this->belongsTo(ChildrenClinic::class);
    }

    public function generateCode()
    {
        return rand(pow(10, 8-1), pow(10, 8)-1);
    }
}
