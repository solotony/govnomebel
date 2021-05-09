<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
	public function index(Request $request, $product)
	{
		$product = Product::where('path', $product)->first();
		$models = $product->models;
		return view('models', ['product' => $product, 'models' => $models]);
	}
	
	public function getModel(Request $request, $product, $model)
	{
		
	}
}
