<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password', 'address', 'phone', 'role', 'active','activation_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function comments()
    {
        return $this->belongsTo('App\Comment');
    }
    public function rating()
    {
        return $this->belongsTo('App\Rating');
    }
    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

}
