<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

//use Illuminate\Support\Str;

class Sofa extends Model
{
    use CrudTrait;
    use Sluggable;
    use SluggableScopeHelpers;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'sofas';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = [
        'setting_options' => 'array'
    ];

    public const METAL_IN_ARMREST = 'metal_in_armrest';
    public const METAL_IN_BASE = 'metal_in_base';
    public const METAL_IN_BACK = 'metal_in_back';
    public const BAR_IN_ARMREST = 'bar_in_armrest';
    public const BAR_IN_BASE = 'bar_in_base';
    public const BAR_IN_BACK = 'bar_in_back';
    public const LEFT_ARMREST = 'left_armrest';
    public const RIGHT_ARMREST = 'right_armrest';
    public const TAPE_ARMREST = 'tape_armrest';
    public const TAPE_BACK = 'tape_back';
    public const TAPE_BASE = 'tape_base';
    public const SOLID_WOOD_DRAWER = 'solid_wood_drawer';
    public const AVERAGE_MAGNESS = 'average_magness';
    public const SOFT = 'Soft';
    public const ULTRASOFT = 'UltraSoft';

    public const MECHANISM_IN_ARMRESTS = 'mechanism_in_armrests';
    public const FOLDING_MECHANISM = 'folding_mechanism';
    public const DOWN_NATURAL = 'down_natural';
    public const CALICO = 'calico';
    public const LEGS = 'legs';
    public const ZIPPER = 'zipper';
    public const HARD_COVERING = 'hard_covering';

    private const STRAIGHT = 'straight';
    private const ANGLE = 'angle';
    private const OTTOMAN = 'ottoman';

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($obj) {
            \Debugbar::info('deleting', $obj);
            //\Storage::disk('public_folder')->delete($obj->image);
        });
    }

    public static function typeSofa()
    {
        return [
            self::STRAIGHT => 'Прямой диван',
            self::ANGLE => 'Угловой диван',
            self::OTTOMAN => 'Диван с оттоманкой',
        ];
    }

    public static function optionsList()
    {
        return [
            self::METAL_IN_BASE => 'Металлокаркас в основании',
            self::METAL_IN_BACK => 'Металлокаркас в спинке',
            self::METAL_IN_ARMREST => 'Метеллокаркас в подлокотнике',

            self::BAR_IN_ARMREST => 'Брусок в полокотнике',
            self::BAR_IN_BASE => 'Брусок в основании',
            self::BAR_IN_BACK => 'Брусок в спинке',

            self::MECHANISM_IN_ARMRESTS => 'Механизм в подлокотниках',
            self::FOLDING_MECHANISM => 'Раскладной Механизм',

            self::LEFT_ARMREST => 'Левый подлокотник',
            self::RIGHT_ARMREST => 'Правый подлокотник',

            self::TAPE_ARMREST => 'Лента в подлокотнике',
            self::TAPE_BACK => 'Лента в спинке',
            self::TAPE_BASE => 'Лента в основании',
            self::SOLID_WOOD_DRAWER => 'Царга из массива',

            self::DOWN_NATURAL => 'Пух натуральный',
            self::CALICO => 'Бязь',
            self::LEGS => 'Ножки',
            self::ZIPPER => 'Молния',
            self::HARD_COVERING => 'Твердое покрытие'
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setUnder1Attribute($value)
    {
        $attribute_name = "under1";
        $this->updateImage($value, $attribute_name);
    }

    public function setUnder2Attribute($value)
    {
        $attribute_name = "under2";
        $this->updateImage($value, $attribute_name);
    }

    public function setUnder3Attribute($value)
    {
        $attribute_name = "under3";
        $this->updateImage($value, $attribute_name);
    }

    public function setUnder4Attribute($value)
    {
        $attribute_name = "under4";
        $this->updateImage($value, $attribute_name);
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $this->updateImage($value, $attribute_name);
    }

    /**
     * @param $value
     * @param $attribute_name
     */
    public function updateImage($value, $attribute_name): void
    {
        $disk = config('backpack.base.root_disk_name');
        $destination_path = "public/uploads/sofa/" . $this->slug;

        if ($value == null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }

        if (Str::startsWith($value, 'data:image')) {
            $image = \Image::make($value)->encode('jpg', 100);
            $filename = md5($value . time()) . '.jpg';

            \Storage::disk($disk)->put($destination_path . '/' . $filename, $image->stream());
            \Storage::disk($disk)->delete($this->{$attribute_name});

            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path . '/' . $filename;
        }
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
