<?php

namespace App\Http\Transformers;

use App\Models\Goal;

class GoalTransformer extends Transformer
{
    protected $availableIncludes = ['new_diary'];

    public function transform(Goal $goal)
    {
        return $goal->attributesToArray();
    }

    public function includeNewDiary(Goal $goal)
    {
        return $this->item($goal->new_diary, new DiaryTransformer());
    }

}