<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FabricsRequest;
use App\Models\Fabrics\Color;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FabricsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FabricsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Fabrics\Fabric::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/fabrics');
        CRUD::setEntityNameStrings('Ткань', 'Ткани');
    }


    protected function setupListOperation()
    {
        CRUD::addColumn(['name' => 'id', 'type' => 'number']);
        $this->crud->addColumn([
            'label' => "Код ткани",
            'name' => 'fabric_code',

        ]);
        $this->crud->addColumn([
            'label' => "Поставщик",
            'type' => 'select',
            'name' => 'producer_id',
            'entity' => 'producers',
            'attribute' => 'name',
        ]);
        $this->crud->addColumn([
            'label' => "Базовый цвет",
            'type' => 'select',
            'name' => 'base_color_id',
            'entity' => 'baseColor',
            'attribute' => 'name',
        ]);
        $this->crud->addColumn([
            'label' => "Тип ткани",
            'type' => 'select',
            'name' => 'fabrics_type_id',
            'entity' => 'fabricType',
            'attribute' => 'name',
        ]);
        CRUD::addColumn(['name' => 'price', 'label' => 'Цена', 'type' => 'number']);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(FabricsRequest::class);

        $this->crud->addField([
            'label' => "Поставщик",
            'type' => 'select',
            'name' => 'producer_id',
            'entity' => 'producers',
            //'model'     => "App\Models\Fabrics\Producer",
            'attribute' => 'name',
            'options' => (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }),
            'tab' => 'Основные'
        ]);

        $this->crud->addField([
            'name' => 'name_site',
            'label' => 'Название с сайта',
            'tab' => 'Основные'
        ]);

        $this->crud->addField([
            'label' => "Коллекция",
            'type' => 'select',
            'name' => 'collection_id',
            'entity' => 'collection',
            //'model'     => "App\Models\Fabrics\Collection",
            'attribute' => 'name',
            'options' => (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }),
            'tab' => 'Основные'
        ]);

        $this->crud->addField([
            'name' => 'color_number',
            'label' => '№ цвета',
            'tab' => 'Основные'
        ]);
        $this->crud->addField([
            'name' => 'fabric_code',
            'label' => 'Код ткани',
            'tab' => 'Основные'
        ]);

        $this->crud->addField([
            'label' => "Тип ткани",
            'type' => 'select',
            'name' => 'fabrics_type_id',
            'entity' => 'fabricType',
            //'model'     => "App\Models\Fabrics\FabricType",
            'attribute' => 'name',
            'options' => (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }),
            'tab' => 'Основные'
        ]);

        $this->crud->addField([
            'label' => "Базовый цвет",
            'type' => 'select',
            'name' => 'base_color_id',
            'entity' => 'baseColor',
            //'model'     => "App\Models\Fabrics\Color",
            'attribute' => 'name',
            'options' => (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }),
            'tab' => 'Основные'
        ]);

        $this->crud->addField([
            'label' => "Доп характеристика",
            'type' => 'select',
            'name' => 'dop_color_id',
            'entity' => 'subDopColor',
            //'model'     => "App\Models\Fabrics\Color",
            'attribute' => 'name',
            'options' => (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }),
            'tab' => 'Основные'
        ]);

        $this->crud->addField([
            'label' => "Доп характеристика2",
            'type' => 'select',
            'name' => 'add_color_id',
            'entity' => 'addCharacteristic',
            //'model'     => "App\Models\Fabrics\Color",
            'attribute' => 'name',
            'options' => (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }),
            'tab' => 'Основные'
        ]);

        $this->crud->addField([
            'name' => 'price',
            'label' => 'Цена',
            'type' => 'number',
            'tab' => 'Основные'
        ]);

        CRUD::addFields([
            [
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'upload',
                'upload' => true,
                'disk' => 'public',
                'tab' => 'Картинка',
            ],
        ]);
        $this->crud->addField([
            'name' => 'history',
            'label' => 'История',
            'type' => 'history',
            'tab' => 'История'
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
