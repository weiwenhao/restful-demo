<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;

class Transformer extends TransformerAbstract
{
    public function __call($name, $arguments)
    {
//       dd($name);
    }

    private function bindParams($query, $params)
    {
        isset($params['limit'][0]) &&  $query->limit($params['limit'][0]);
        isset($params['limit'][1]) &&  $query->offset($params['limit'][1]);
        isset($params['order']) &&  $query->orderBy($params['order'][0], optional($params['order'])[1]);
        isset($params['fields']) && $query->select($params['fields']);
    }
}