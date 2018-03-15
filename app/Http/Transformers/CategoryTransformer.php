<?php

namespace App\Http\Transformers;

use App\Models\Category;

class CategoryTransformer extends Transformer
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
}