<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Messagable;

class User extends Authenticatable
{
    use Notifiable, HasRoles, Messagable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'state', 'password', 'group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function public_message ()
    {
        return $this->hasMany('App\Public_message');
    }

    public function group ()
    {
        return $this->hasOne('App\Group');
    }

    public function isActive ()
    {
        return $this->state == 1;
    }
}
