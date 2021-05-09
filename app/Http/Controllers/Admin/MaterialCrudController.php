<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MaterialRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MaterialCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MaterialCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Material::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/material');
        CRUD::setEntityNameStrings('Материал', 'Материалы');
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
        CRUD::addColumn(['name' => 'unit', 'label' => 'Ед.изм.']);
        CRUD::addColumn(['name' => 'price', 'label' => 'Цена']);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(MaterialRequest::class);

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
            'tab' => 'Основные'
        ]);

        $this->crud->addField([
            'name' => 'unit',
            'label' => 'Ед. изм.',
            'tab' => 'Основные'
        ]);

        $this->crud->addField([
            'name' => 'slug',
            'label' => 'Slug',
            'tab' => 'Доп'
        ]);

        $this->crud->addField([
            'name' => 'price',
            'label' => 'Цена',
            'type' =>'number',
            'tab' => 'Основные'
        ]);

        $this->crud->addField([
            'name' => 'history',
            'label' => 'История',
            'type' =>'history',
            'tab' => 'История'
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
