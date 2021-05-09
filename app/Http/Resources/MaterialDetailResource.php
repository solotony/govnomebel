<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MaterialDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        ini_set( 'serialize_precision', -1 );
        
        return [
            $this->slug => [
                'name' => $this->name,
                'slug' => $this->slug,
                'price' => $this->price,
                'unit' => $this->unit,
            ]
        ];
    }
}
