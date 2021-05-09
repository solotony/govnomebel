<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EstimateWorkRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EstimateWorkCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EstimateWorkCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\EstimateWork::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/estimatework');
        CRUD::setEntityNameStrings('Смета работы', 'Смета работ');
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
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
            'tab' => 'Основные',
        ]);

        $this->crud->addField([
            'name' => 'slug',
            'label' => 'Slug',
            'tab' => 'Основные',
        ]);

        $this->crud->addField([
            'name' => 'threshold',
            'label' => 'Предел',
            'type' => 'number',
            'default' => 0,
            'tab' => 'Основные',
        ]);

        $this->crud->addField([
            'name' => 'size',
            'label' => 'Размер',
            'type' => 'checkbox',
            'tab' => 'Основные',
        ]);

        $this->crud->addField([
            'name' => 'first',
            'label' => 'Первый',
            'type' => 'number',
            'default' => 0,
            'tab' => 'Основные',
        ]);

        $this->crud->addField([
            'name' => 'second',
            'label' => 'Второй',
            'type' => 'number',
            'default' => 0,
            'tab' => 'Основные',
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
}
