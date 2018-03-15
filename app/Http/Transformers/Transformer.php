<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;

class Transformer extends TransformerAbstract
{
    public function __call($name, $arguments)
    {
//       dd($name);
    }
}