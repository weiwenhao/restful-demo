<?php

namespace App\Http\Transformers;

use App\Models\Category;
use League\Fractal\ParamBag;

class CategoryTransformer extends Transformer
{
    protected $availableIncludes = ['best_diary', 'hot_users'];


    public function transform(Category $category)
    {
        $data = $category->attributesToArray();
        return $data;
    }

    public function includeBestDiary(Category $category)
    {
        return $this->item($category->bestGoal->newDiary, new DiaryTransformer());
    }

    public function includeHotUsers(Category $category)
    {
        $users = $category->users()->select('id', 'avatar')->orderBy('kept_days', 'desc')->limit(5)->get();

        return $this->collection($users, new UserTransformer());
    }
}