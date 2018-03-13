<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
