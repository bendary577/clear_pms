<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'extension',
        'path'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
