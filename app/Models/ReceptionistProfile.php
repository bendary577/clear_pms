<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceptionistProfile extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $fillable = [
        'shift_start',
        'shift_end',
    ];

    public function user() 
    { 
      return $this->morphOne('App\Models\User', 'profile');
    }

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

}
