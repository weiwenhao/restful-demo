<?php

namespace App\Http\Transformers;

use App\Models\Diary;

class DiaryTransformer extends Transformer
{
    protected $availableIncludes = ['user'];

    public function transform(Diary $diary)
    {
        return [
            'id' => $diary->id,
            'category_id' => $diary->category_id,
            'content' => $diary->content,
            'created_at' => $diary->created_at,
            'goal_id' => $diary->goal_id,
            'images' => (array) $diary->images,
            'audio' => $diary->audio,
            'video' => $diary->video
        ];
    }

    public function includeUser(Diary $diary)
    {
        return $this->item($diary->user, new UserTransformer());
    }
}