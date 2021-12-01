<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ElasticScoutDriverPlus\Searchable;
use Elasticquent\ElasticquentTrait;

class Patient extends Model
{
    use HasFactory, ElasticquentTrait;
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

    protected $mappingProperties = array(
        'name' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
      );

    public static function boot() {
        parent::boot();
        static::deleting(function($patient) { // before delete() method call this
            $patient->appointments()->delete();
            $patient->files()->delete();
        });
    }  

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

    public function receptionistProfile()
    {
        return $this->belongsTo(ReceptionistProfile::class);
    }

}
