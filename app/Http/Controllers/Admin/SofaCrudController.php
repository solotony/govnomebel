<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SofaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SofaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SofaCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Sofa::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/sofa');
        CRUD::setEntityNameStrings('Диван', 'Диваны');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
        CRUD::addColumn(['name' => 'id', 'type' => 'string', 'label' => 'id']);
        CRUD::addColumn(['name' => 'config', 'type' => 'string', 'label' => 'Тип']);
        CRUD::addColumn(['name' => 'name', 'type' => 'string', 'label' => 'Название']);
        CRUD::addColumn(['name' => 'amountDiscount', 'type' => 'number', 'label' => 'Скидка']);
        CRUD::addColumn(['name' => 'oldPrice', 'type' => 'number', 'label' => 'Старая цена']);
        CRUD::addColumn(['name' => 'newPrice', 'type' => 'number', 'label' => 'Новая цена']);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SofaRequest::class);

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
            'tab' => 'Основные',
        ]);
        $this->crud->addField([
            'name' => 'slug',
            'label' => 'slug (если пустое создается)',
            'tab' => 'Основные',
        ]);
        $this->crud->addField([
            'name' => 'config',
            'label' => "Тип дивана",
            'type' => 'select_from_array',
            'options' => CRUD::getModel()->typeSofa(),
            'allows_null' => false,
            'default' => 'one',
            // 'allows_multiple' => true,
        ]);

        $this->crud->addField([
            'label' => 'Like',
            'name' => 'nlike',
            'tab' => 'Основные',
        ]);
        /*$this->crud->addField([
            'name' => 'legs',
            'label' => 'Ножки',
            'type' => 'checkbox',
            'tab' => 'Основные'
        ]);*/

        $this->crud->addField([
            'label' => "Основная",
            'name' => "image",
            'type' => 'image',
            'crop' => true,
            'aspect_ratio' => 2,
            'tab' => 'Картинки',
        ]);
        $this->crud->addField([
            'name' => 'image_description',
            'label' => 'Описание картинки',
            'tab' => 'Картинки',
        ]);
        $this->crud->addField([
            'name' => 'separator',
            'type' => 'custom_html',
            'value' => '<hr>',
            'tab' => 'Картинки'
        ]);
        $this->crud->addField([
            'label' => "Доп картинка 1",
            'name' => "under1",
            'type' => 'image',
            'crop' => true,
            'aspect_ratio' => 0,
            'tab' => 'Картинки',
        ]);
        $this->crud->addField([
            'name' => 'separator2',
            'type' => 'custom_html',
            'value' => '<hr>',
            'tab' => 'Картинки'
        ]);
        $this->crud->addField([
            'label' => "Доп картинка 2",
            'name' => "under2",
            'type' => 'image',
            'crop' => true,
            'aspect_ratio' => 0,
            'tab' => 'Картинки',
        ]);
        $this->crud->addField([
            'name' => 'separator3',
            'type' => 'custom_html',
            'value' => '<hr>',
            'tab' => 'Картинки'
        ]);
        $this->crud->addField([
            'label' => "Доп картинка 3",
            'name' => "under3",
            'type' => 'image',
            'crop' => true,
            'aspect_ratio' => 0,
            'tab' => 'Картинки',
        ]);
        $this->crud->addField([
            'name' => 'separator4',
            'type' => 'custom_html',
            'value' => '<hr>',
            'tab' => 'Картинки'
        ]);
        $this->crud->addField([
            'label' => "Доп картинка 4",
            'name' => "under4",
            'type' => 'image',
            'crop' => true,
            'aspect_ratio' => 0,
            'tab' => 'Картинки',
        ]);

        $this->crud->addField([
            'label' => 'Сумма скидки',
            'name' => 'amountDiscount',
            'tab' => 'Цено образование',
        ]);
        $this->crud->addField([
            'label' => 'Скидка',
            'name' => 'discount',
            'type' => 'checkbox',
            'tab' => 'Цено образование',
        ]);
        $this->crud->addField([
            'label' => 'Старая цена',
            'name' => 'oldPrice',
            'tab' => 'Цено образование',
        ]);
        $this->crud->addField([
            'label' => 'Новая цена',
            'name' => 'newPrice',
            'tab' => 'Цено образование',
        ]);
        $this->crud->addField([
            'label' => 'Прибыль',
            'name' => 'profit',
            'default' => 200,
            'tab' => 'Цено образование',
        ]);

        $this->crud->addField([
            'label' => 'Ткань',
            'name' => 'fabric',
            'tab' => 'Материалы (для списка)',
        ]);
        $this->crud->addField([
            'label' => 'Механизм',
            'name' => 'mechanism',
            'type' => 'checkbox',
            'tab' => 'Материалы (для списка)',
        ]);
        $this->crud->addField([
            'label' => 'Фитинг',
            'name' => 'fittings',
            'tab' => 'Материалы (для списка)',
        ]);

        $this->crud->addField([
            'name' => 'setting_options',
            'label' => "Используемые Опции",
            'type' => 'select_and_order',
            'options' => CRUD::getModel()->optionsList(),
            'tab' => 'Опции',
        ]);

        //Для калькулятора
        $this->crud->addField([
            'label' => 'Спинка высота спинки',
            'name' => 'back_height',
            'tab' => 'Для калькулятора',
        ]);
        $this->crud->addField([
            'label' => 'Спинка толщина спинки',
            'name' => 'back_thickness',
            'tab' => 'Для калькулятора',
        ]);
        $this->crud->addField([
            'label' => 'Подлокотник Толщина',
            'name' => 'armrest_thickness',
            'tab' => 'Для калькулятора',
        ]);
        $this->crud->addField([
            'label' => 'Подлокотник выстота',
            'name' => 'armrest_height',
            'tab' => 'Для калькулятора',
        ]);

        $this->crud->addField([
            'label' => 'Подлокотник ширина',
            'name' => 'armrest_width',
            'tab' => 'Для калькулятора',
        ]);

        $this->crud->addField([
            'label' => 'Z (царга)',
            'name' => 'side_bar_height',
            'tab' => 'Для калькулятора',
        ]);

        $this->crud->addField([
            'label' => 'Толщина подушек',
            'name' => 'cushion_thickness',
            'tab' => 'Для калькулятора',
        ]);

        $this->crud->addField([
            'label' => 'Прибыль',
            'name' => 'profit',
            'tab' => 'Для калькулятора',
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
