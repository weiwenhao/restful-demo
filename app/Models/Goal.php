<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function diaries()
    {
        return $this->hasMany(Diary::class);
    }
}
