<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    public static function collection($resource)
    {
        return parent::collection($resource); // TODO: Change the autogenerated stub
    }

    public static function make(...$parameters)
    {
        return new static(...$parameters);
    }
}
