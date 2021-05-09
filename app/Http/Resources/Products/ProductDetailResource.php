<?php

namespace App\Http\Resources\Products;

use App\Models\EstimateWork;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

/**
 * @property int $id
 * @property string $name
 * @property int $price
 *
 * @property Region $region
 * @property Category $category
 * @property MediaAlias[]|Collection $item
 */
class ProductDetailResource extends JsonResource
{
    public function toArray($request)
    {
        ini_set( 'serialize_precision', -1 );

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name,
            ],
            'options' => $this->setting_options,
            'materials' => Material::all()->pluck('price', 'slug'),
        ];
    }

    public function with($request)
    {
        return [
            'otherCalculation' => array_map(function ($item) {
                $ew = EstimateWork::find($item);
                return [
                    $ew->slug => [
                        'name' => $ew->name,
                        'threshold' => $ew->threshold,
                        'size' => $ew->size ? true : false,
                        'first' => $ew->first,
                        'second' => $ew->second
                    ]];
            }, $this->category->estimate_work)
        ];
    }
}
