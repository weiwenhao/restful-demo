<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function diaries()
    {
        return $this->hasMany(Diary::class);
    }

    public function newDiary()
    {
        return $this->hasOne(Diary::class)->where('status', 2)->orderBy('created_at', 'desc'); // status = 2进行中
    }
}
