<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemConfiguration extends Model
{
    use HasFactory;

    protected $with = ['configuration'];

    protected $fillable = [
      'importing_patients_configurations_chosen',
  ];
 
    public function configuration()
    {
      return $this->morphTo();
    }
}
