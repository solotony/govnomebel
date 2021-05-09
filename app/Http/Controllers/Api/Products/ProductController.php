<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\Products\ProductDetailResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $result = Product::where('id','>',1)->paginate(2);

        return ProductDetailResource::collection($result);
    }

    public function show($slug)
    {
        $product = Product::findBySlugOrFail($slug);

        return new ProductDetailResource($product);
    }
}
