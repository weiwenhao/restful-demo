<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'goals' => GoalResource::collection($this->whenLoaded('goals'))
        ];
//        $data['is_join'] = $this->when(...$this->isJoin());
//        $data['goals'] = new GoalCollection($this->whenLoaded('goals'));

    }

    private function isJoin()
    {

        return [true, true];
    }
}
