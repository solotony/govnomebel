<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'categories';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['id', 'name', 'setting_attributes', 'estimate_work'];
    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = [
        'setting_attributes' => 'array',
        'estimate_work' => 'array'
    ];

    public const METAL_IN_BASE = 'metal_in_base';
    public const METAL_IN_BACK = 'metal_in_back';
    public const METAL_IN_ARMREST = 'metal_in_armrest';
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

            self::LEFT_ARMREST => 'Левый подлокотник',
            self::RIGHT_ARMREST => 'Правый подлокотник',

            self::TAPE_ARMREST => 'Лента в подлокотнике',
            self::TAPE_BACK => 'Лента в спинке',
            self::TAPE_BASE => 'Лента в основании',
            self::SOLID_WOOD_DRAWER => 'Царга из массива',

            self::AVERAGE_MAGNESS => 'Средняя магкость',
            self::SOFT => 'Мягкий',
            self::ULTRASOFT => 'UltraSoft'
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
}
