<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () {
    Route::get('aaaa', 'NewsCrudController@aaa');
    Route::crud('configurationsetting', 'ConfigurationSettingCrudController');
    Route::crud('configurationsize', 'ConfigurationSizeCrudController');
    Route::crud('configurationcolor', 'ConfigurationColorCrudController');
    Route::crud('configuration', 'ConfigurationCrudController');
    Route::crud('configurationtexture', 'ConfigurationTextureCrudController');
    Route::crud('configurationmechanism', 'ConfigurationMechanismCrudController');
    Route::crud('configurationleg', 'ConfigurationLegCrudController');
    Route::crud('configurationsoftnesssofa', 'ConfigurationSoftnessSofaCrudController');
    Route::crud('page', 'PageCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('sofa', 'SofaCrudController');
    Route::crud('material', 'MaterialCrudController');

    Route::crud('fabrics', 'FabricsCrudController');
    Route::crud('fabrics-type', 'FabricTypeCrudController');
    Route::crud('color', 'ColorCrudController');
    Route::crud('producer', 'ProducerCrudController');
    Route::crud('fabrics-collection', 'FabricsCollectionsCrudController');
    Route::crud('estimatework', 'EstimateWorkCrudController');

    Route::get('contract', 'Contract\ContractController@index');
});
