<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function bestGoal()
    {
        return $this->hasOne(Goal::class);
    }

    public function diaries()
    {
        return $this->hasMany(Diary::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
