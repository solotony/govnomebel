<?php

namespace App\Http\Controllers\Api\Fabrics;

use App\Http\Controllers\Controller;
use App\Http\Resources\Fabrics\FabricsDetailResource;
use App\Models\Fabrics\Fabric;


class FabricsController extends Controller
{
    public function index()
    {
        $result = Fabric::where('id', '>', 0)->paginate(20);

        return FabricsDetailResource::collection($result);
    }

    public function show(Fabric $fabric)
    {
        return new FabricsDetailResource($fabric);
    }
}
