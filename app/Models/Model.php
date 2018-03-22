<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    protected $hidden = ['updated_at'];

    public function getCreatedAtAttribute($value)
    {
        return strtotime($value);
    }

    public function getBeganAtAttribute($value)
    {
        return strtotime($value);
    }

    public function getEndedAtAttribute($value)
    {
        return strtotime($value);
    }
}
