<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perscreption extends Model
{
    use HasFactory;

    protected $with = ['diagnose'];

    protected $fillable = [];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function diagnose()
    {
        return $this->hasOne(Diagnose::class, 'perscreption_id', 'id');
    }

    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
}
