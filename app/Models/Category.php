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


    /**
     * 有效的goals
     */
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }
}
