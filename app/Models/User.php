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
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'activated',
        'blocked'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
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

}
