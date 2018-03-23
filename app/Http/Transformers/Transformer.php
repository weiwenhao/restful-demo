<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;

class Transformer extends TransformerAbstract
{
    protected $disableEagerLoadedIncludes = [];

    public function getDisableEagerLoadedIncludes()
    {
        return $this->disableEagerLoadedIncludes;
    }
}