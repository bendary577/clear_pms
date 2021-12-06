<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    protected $with = ['profile'];
 
    protected $fillable = [
        'name',
        'name_arabic',
        'username',
        'email',
        'password',
        'activated',
        'blocked',
        'phone',
        'avatar_path',
        'about'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function profile()
    {
      return $this->morphTo();
    }

    public function getHasAdminProfileAttribute(){
        return $this->profile_type == 'App\Models\AdminProfile';
    }

    public function getHasDoctorProfileAttribute(){
        return $this->profile_type == 'App\Models\DoctorProfile';
    }

    public function getHasReceptionistProfileAttribute(){
        return $this->profile_type == 'App\Models\ReceptionistProfile';
    }

    public function generateForgotPasswordCode(){
        return rand(pow(10, 8-1), pow(10, 8)-1);
    }

}
