<?php

namespace App\Http\Transformers;

use App\Models\Goal;

class GoalTransformer extends Transformer
{
    protected $availableIncludes = ['new_diary'];

    public function transform(Goal $goal)
    {
        $data = $goal->attributesToArray();

        return array_intersect_key($goal->toArray(), $data);
    }

    public function includeNewDiary(Goal $goal)
    {
        return $this->item($goal->new_diary, new DiaryTransformer());
    }

}