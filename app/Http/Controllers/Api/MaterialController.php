<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MaterialDetailResource;
use App\Models\EstimateWork;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $result = Material::all();

        return MaterialDetailResource::collection($result);
    }

}
