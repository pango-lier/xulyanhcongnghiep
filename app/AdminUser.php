<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class AdminUser extends Authenticatable
{
    //
    use Notifiable;
    protected$table='admin_users';

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
    public function isSupperAdmin()
    {
    	if($this->roles==0) return true;
    	return false;
    }
    public function isAdmin()
    {
    	if($this->roles<=1) return true;
    	return false;
    }
}
