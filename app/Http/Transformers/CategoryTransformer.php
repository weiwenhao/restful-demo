<?php

namespace App\Http\Transformers;

use App\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['best_diary'];

    public function transform(Category $category)
    {
        $data = $category->attributesToArray();
        return $data;
    }


    public function includeBestDiary(Category $category)
    {
        return $this->item($category->bestGoal->newDiary, new DiaryTransformer());
    }

    public function includeIsJoin()
    {
        
    }
}