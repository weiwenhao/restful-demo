<?php

namespace App\Http\Transformers;

use App\Models\Goal;
use League\Fractal\TransformerAbstract;

class GoalTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['new_diary'];

    public function transform(Goal $goal)
    {
        $data = $goal->attributesToArray();

        return $data;
    }

    public function includeNewDiary(Goal $goal)
    {
        return $this->item($goal->new_diary, new DiaryTransformer());
    }

}