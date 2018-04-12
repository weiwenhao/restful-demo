<?php

namespace App\Models;

use App\Models\Helpers\ImagesCasts;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diary extends Model
{
    use SoftDeletes, ImagesCasts;

    protected $dates = ['deleted_at'];

    protected $fillable = ['images', 'audio', 'video', 'content', 'goal_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['avatar', 'nickname', 'id', 'sex']);
    }
}
