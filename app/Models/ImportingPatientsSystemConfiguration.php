<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportingPatientsSystemConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'excel_policy',
        'code_policy'
    ];

    public function systemConfiguration() 
    { 
      return $this->morphOne('App\Models\SystemConfiguration', 'configuration');
    }
}
