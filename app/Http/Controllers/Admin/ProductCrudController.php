<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('Продукт', 'Продукты');
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
        CRUD::addColumn(['name' => 'slug', 'label' => 'Slug']);

        CRUD::addFilter([
            'name' => 'category_id',
            'type' => 'select2',
            'label' => 'Фильтр Категории'
        ], function () {
            return Category::all()->keyBy('id')->pluck('name', 'id')->map(function ($item, $index) {
                return str_replace('<br>', '', $item);
            })->toArray();
        }, function ($value) {
            $this->crud->addClause('where', 'category_id', $value);
        });

        CRUD::addColumn([
            // 1-n relationship
            'label' => 'Категория', // Table column heading
            'type' => 'select',
            'name' => 'category_id', // the column that contains the ID of that connected entity;
            'entity' => 'category', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'visibleInTable' => true,
            'visibleInModal' => true,
            'limit' => 20,
        ]);

        CRUD::addColumn([
            'name'  => 'updated_at',
            'label' => 'Дата',
            'type'  => 'datetime'
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProductRequest::class);

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
            'tab' => 'Основные',
        ]);

        $this->crud->addField([
            'name' => 'slug',
            'label' => 'Slug (URL)',
            'type' => 'text',
            'hint' => 'Будет автоматически сгенерировано, если оставить пустым.',
            'tab' => 'Доп',
        ]);

        CRUD::addFields([
            [
                'label' => 'Категория',
                'type' => 'select2',
                'name' => 'category_id',
                'entity' => 'category',
                'attribute' => 'name',
                'tab' => 'Основные',
            ]
        ]);

        CRUD::addFields([
            [
                'name'      => 'photos',
                'label'     => 'Photos',
                'type'      => 'upload_multiple',
                'upload'    => true,
                'disk'      => 'media',
                'tab' => 'Фото'
            ]
        ]);
        $this->crud->addField([
            'name' => 'setting_options',
            'label' => "Используемые Опции",
            'type' => 'select_and_order',
            'options' => CRUD::getModel()->optionsList(),
            'tab' => 'Опции',
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
