<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use  Authenticatable, Authorizable, CanResetPassword, Notifiable;

    protected $hidden = ['updated_at', 'openid'];

    public function diaries()
    {
        return $this->hasMany(Diary::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function newDiary()
    {
        return $this->hasOne(Diary::class)->where('status', 2)->orderBy('created_at', 'desc'); // status = 2进行中
    }
}
