<?php

namespace App\Http\Resources\Fabrics;

use App\Models\Material;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class FabricsDetailResource extends JsonResource
{
    /**
     * @property int $id
     * @property int $price
     *
     * @property MediaAlias[]|Collection $item
     */
    public function toArray($request)
    {
        ini_set('serialize_precision', -1);

        return [
            'id' => $this->id,
            'name' => $this->name_site,
            'slug' => $this->fabric_code,
            'images' => $this->image ? asset('storage/' . $this->image) : '',
            'price' => $this->price,
            'producers' => [
                'id' => $this->producers->id,
                'name' => $this->producers->name
            ],
            'collection' => [
                'id' => $this->collection->id,
                'name' => $this->collection->name
            ],
            'fabricType' => [
                'id' => $this->fabricType->id,
                'name' => $this->fabricType->name
            ],
            'colors' => [
                'baseColor' => [
                    'id' => $this->baseColor->id,
                    'name' => $this->baseColor->name,
                    'eng' => $this->baseColor->eng
                ],
                'dopColor' => [
                    'id' => $this->subDopColor->id,
                    'name' => $this->subDopColor->name,
                    'eng' => $this->subDopColor->eng
                ],
                'addColor' => $this->addCharacteristic ? [
                    'id' => $this->addCharacteristic->id,
                    'name' => $this->addCharacteristic->name,
                    'emg' => $this->addCharacteristic->emg
                ] : null
            ]
        ];
    }
}
