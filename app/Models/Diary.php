<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Diary extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['images', 'audio', 'video', 'content', 'goal_id', 'user_id'];

    protected $casts = [
      'images' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['avatar', 'nickname', 'id', 'sex']);
    }
}
