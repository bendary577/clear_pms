<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perscreption extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
}
