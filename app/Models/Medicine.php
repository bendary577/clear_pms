<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dose',
        'duration'
    ];

    public function perscreption()
    {
        return $this->belongsTo(Perscreption::class);
    }

}
