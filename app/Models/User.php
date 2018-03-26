<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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
