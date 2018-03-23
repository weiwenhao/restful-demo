<?php

namespace App\Services;


use League\Fractal\Manager as FractalManager;

class Fractal extends \Dingo\Api\Transformer\Adapter\Fractal
{
    /**
     * Get includes as their array keys for eager loading.
     *
     * @param \League\Fractal\TransformerAbstract $transformer
     * @param string|array                        $requestedIncludes
     *
     * @return array
     */
    protected function mergeEagerLoads($transformer, $requestedIncludes)
    {
        $includes = array_merge($requestedIncludes, $transformer->getDefaultIncludes());
        $includes = array_diff($includes, $transformer->getDisableEagerLoadedIncludes());
        $eagerLoads = [];

        foreach ($includes as $key => $value) {
            $eagerLoads[] = is_string($key) ? $key : $value;
        }

        return $eagerLoads;
    }


}
