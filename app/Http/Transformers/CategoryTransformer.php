<?php

namespace App\Http\Transformers;

use App\Models\Category;
use App\Resources\ScalarResource;
use League\Fractal\ParamBag;
use League\Fractal\Resource\NullResource;

class CategoryTransformer extends Transformer
{
    protected $availableIncludes = ['best_diary', 'hot_users', 'is_join'];
    protected $disableEagerLoadedIncludes = ['best_diary', 'hot_users', 'is_join'];

    public function transform(Category $category)
    {
        return $category->attributesToArray();
    }

    public function includeBestDiary(Category $category)
    {
        return $this->item($category->bestGoal->newDiary, new DiaryTransformer());
    }

    public function includeHotUsers(Category $category, ParamBag $params)
    {
        $users = $category->users()->select('id', 'avatar')->orderBy('kept_days', 'desc')->limit($params->get('limit')[0] ?? 5)->get();

        return $this->collection($users, new UserTransformer());
    }

    public function includeIsJoin()
    {
        return $this->primitive(true);
    }
}