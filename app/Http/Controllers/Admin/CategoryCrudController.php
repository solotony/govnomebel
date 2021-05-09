<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\EstimateWork;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Category::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/category');
        CRUD::setEntityNameStrings('Категория', 'Категории');
        $this->crud->allowAccess('reorder');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn(['name' => 'name', 'label' => 'Название']);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CategoryRequest::class);

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
            'tab' => 'Основные'
        ]);

        $this->crud->addField([
            'name' => 'setting_attributes',
            'label' => "Используемые Атрибуты",
            'type' => 'select_and_order',
            'options' => [
                'configuration' => 'Конфигурация',
                'size' => 'Размеры',
                'texture' => 'Текстура',
                'color' => 'Цвет ткани',
                'mechanism' => 'Механизм',
                'leg' => 'Ножки',
                'softness_sofa' => 'Мягкость дивана'
            ],
            'tab' => 'Атрибуты',
        ]);

        $this->crud->addField([
            'name' => 'setting_options',
            'label' => "Используемые Опции",
            'type' => 'select_and_order',
            'options' => CRUD::getModel()->optionsList(),
            'tab' => 'Опции',
        ]);

        $this->crud->addField([
            'name' => 'estimate_work',
            'label' => "Смета работ",
            'type' => 'select_and_order',
            'options' => EstimateWork::get()->pluck('name', 'id')->toArray(),
            'tab' => 'Смета работ',
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupReorderOperation()
    {
        CRUD::set('reorder.label', 'name');
        CRUD::set('reorder.max_level', 2);
    }
}
