<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\Products\SofaDetailResource;
use App\Http\Resources\Products\SofaShowDetailResource;
use App\Models\Sofa;
use Illuminate\Http\Request;

class SofaController extends Controller
{
    public function index()
    {
        $result = Sofa::orderBy('name')->paginate(20);

        return SofaDetailResource::collection($result);
    }

    public function show($slug)
    {
        $product = Sofa::findBySlugOrFail($slug);

        return new SofaShowDetailResource($product);
    }
}
