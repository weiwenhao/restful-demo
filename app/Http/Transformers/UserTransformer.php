<?php

namespace App\Http\Transformers;

use App\Models\User;
use League\Fractal\ParamBag;

class UserTransformer extends Transformer
{
    protected $availableIncludes = ['diaries', 'total'];

    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'nickname' => $user->nickname,
            'kept_days' => $user->kept_days,
            'openid' => $user->openid,
            'avatar' => $user->avatar
        ];
    }

    public function includeDiaries(User $user, ParamBag $params = null)
    {
        $query = $user->diaries();

        isset($params['limit']) &&  $query->offset($params['limit'][1])->limit($params['limit'][0]);
        isset($params['order']) &&  $query->orderBy($params['order'][0], $params['order'][1]);
        isset($params['fields']) && $query->select($params['fields']);

        return $this->collection($query->get(), new DiaryTransformer());
    }
//    private function parseWhere()
}