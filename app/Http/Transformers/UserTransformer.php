<?php

namespace App\Http\Transformers;

use App\Models\User;
use League\Fractal\ParamBag;

class UserTransformer extends Transformer
{
    protected $availableIncludes = ['diaries', 'total'];

    public function transform(User $user)
    {
        return $user->attributesToArray();
    }

    public function includeDiaries(User $user, ParamBag $params = null)
    {
        $query = $user->diaries();

        isset($params['limit']) &&  $query->offset($params['limit'][1])->limit($params['limit'][0]);
        isset($params['order']) &&  $query->orderBy($params['order'][0], $params['order'][1]);
        isset($params['fields']) && $query->select($params['fields']);

        return $this->collection($query->get(), new DiaryTransformer());
    }

    public function includeTotal(User $user)
    {

    }

//    private function parseWhere()
}