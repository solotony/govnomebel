<?php

namespace App\Models\Fabrics;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Fabric extends Model
{
    use CrudTrait;
    use LogsActivity;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'fabrics';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'producer_id', 'fabrics_type_id', 'collection_id',
        'base_color_id', 'dop_color_id', 'add_color_id',
        'name_site', 'fabric_code', 'color_number', 'price', 'image'
    ];
    // protected $hidden = [];
    // protected $dates = [];
    protected static $logAttributes = [
        'producer_id', 'fabrics_type_id', 'collection_id',
        'base_color_id', 'dop_color_id', 'add_color_id',
        'name_site', 'fabric_code', 'color_number', 'price', 'image'
    ];

    protected static $logOnlyDirty = true;
    protected static $logName = 'fabric';

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($obj) {
            \Storage::disk('public_folder')->delete($obj->image);
        });
    }

    public function getRouteKeyName()
    {
        return 'fabric_code'; //slug
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function producers()
    {
        return $this->belongsTo(Producer::class, 'producer_id', 'id');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id', 'id');
    }

    public function fabricType()
    {
        return $this->belongsTo(FabricType::class, 'fabrics_type_id', 'id');
    }

    public function baseColor()
    {
        return $this->belongsTo(Color::class, 'base_color_id', 'id');
    }

    public function subDopColor()
    {
        return $this->belongsTo(Color::class, 'dop_color_id', 'id');
    }

    public function addCharacteristic()
    {
        return $this->belongsTo(Color::class, 'add_color_id', 'id');
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

    public function setImageAttribute($value)
    {
        //  dd($value);
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "fabrics";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
