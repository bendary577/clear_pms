<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'province',
        'city',
        'street',
        'notes',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
