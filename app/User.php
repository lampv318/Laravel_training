<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function program(){
        return $this->hasMany('App\Program', 'user_id', 'id');
    }

    public function my_programs(){
        return $this->hasMany('App\MyProgram', 'user_id', 'id');
    }

    public function following_program(){
        return $this->hasManyThrough('App\Program', 'App\MyProgram', 'user_id', 'id', 'id', 'program_id');;
    }
}
