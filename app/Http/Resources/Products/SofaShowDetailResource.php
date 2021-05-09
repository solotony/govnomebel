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
class SofaShowDetailResource extends JsonResource
{
    public function toArray($request)
    {
        ini_set('serialize_precision', -1);

        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'back_height' => $this->back_height,
            'back_thickness' => $this->back_thickness,
            'armrest_thickness' => $this->armrest_thickness,
            'armrest_height' => $this->armrest_height,
            'armrest_width' => $this->armrest_width,
            'side_bar_height' => $this->side_bar_height,
            'cushion_thickness' => $this->cushion_thickness,
            'profit' => $this->profit,
            'like' => $this->nlike ? true : false,
            'image' => strpos($this->image,'sdelay.online') === false ? 'http://sdelay.online/'.$this->image :$this->image,
            'under_1' => strpos($this->under1,'sdelay.online') === false ? 'http://sdelay.online/'.$this->under1 :$this->under1,
            'under_2' => strpos($this->under2,'sdelay.online') === false ? 'http://sdelay.online/'.$this->under2 :$this->under2,
            'under_3' => strpos($this->under3,'sdelay.online') === false ? 'http://sdelay.online/'.$this->under3 :$this->under3,
            'under_4' => strpos($this->under4,'sdelay.online') === false ? 'http://sdelay.online/'.$this->under4 :$this->under4,
            'options' => $this->setting_options

            /*            'legs' => $this->legs ? true : false,
                        'image' => $this->image,
                        'under_1' => $this->under_1,
                        'under_2' => $this->under_2,
                        'under_3' => $this->under_3,
                        'under_4' => $this->under_4,
                        'amountDiscount' => $this->amountDiscount,
                        'discount' => $this->discount ? true : false,
                        'oldPrice' => $this->oldPrice,
                        'newPrice' => $this->newPrice,
                        'fabric' => $this->fabric,
                        'mechanism' => $this->mechanism ? true : false,
                        'fittings' => $this->fittings,
                        'like' => $this->nlike ? true : false*/
        ];
    }

    /*public function with($request)
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
    }*/
}
