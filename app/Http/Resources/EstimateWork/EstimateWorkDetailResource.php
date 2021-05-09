<?php

namespace App\Http\Resources\EstimateWork;

use Illuminate\Http\Resources\Json\JsonResource;

class EstimateWorkDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            $this->slug => [
                'name' => $this->name,
                'slug' => $this->slug,
                'threshold' => $this->threshold,
                'size' => $this->size ? true : false,
                'first' => $this->first,
                'second' => $this->second
            ]
        ];
    }
}
