<?php

namespace App\Models\Helpers;

trait ImagesCasts
{
    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }

    public function getImagesAttribute()
    {
        return (array) json_decode($this->attributes['images']);
    }
}