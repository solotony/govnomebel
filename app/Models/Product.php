<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model implements HasMedia
{
    use CrudTrait;
    use InteractsWithMedia;
    use Sluggable;
    use SluggableScopeHelpers;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    protected $table = 'products';
    protected $primaryKey = 'id';

    /*protected $primaryKey = 'slug';
    public $incrementing = false;*/

    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['name', 'slug', 'category_id', 'photos', 'setting_options'];

    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = [
        'photos' => 'array',
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

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
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

            self::AVERAGE_MAGNESS => 'Средняя магкость',
            self::SOFT => 'Мягкий',
            self::ULTRASOFT => 'UltraSoft',

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
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

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
    public function getPhotosAttribute($value)
    {
        $ar = [];
        foreach ($this->getMedia('big') as $image) {
            //$ar[] = str_replace('/storage/', '', $image->getUrl());
            $ar[] = $image->getUrl();
        }
        return $ar;
    }

    public function setPhotosAttribute($value)
    {
        foreach ($value as $files) {
            if (is_object($files)) {
                $this->addMedia($files)->toMediaCollection('big');
            }
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
