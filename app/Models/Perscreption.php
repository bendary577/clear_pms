<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perscreption extends Model
{
    use HasFactory;

    protected $with = ['diagnose'];

    protected $fillable = [];

    public static function boot() {
        parent::boot();
        static::deleting(function($perscreption) { // before delete() method call this
            $perscreption->diagnose()->delete();
            $perscreption->medicines()->delete();
        });
    }

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
