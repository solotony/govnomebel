<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstimateWork\EstimateWorkDetailResource;
use App\Models\EstimateWork;
use Illuminate\Http\Request;

class EstimateWorkController extends Controller
{
    public function index()
    {
        $result = EstimateWork::all();

        return EstimateWorkDetailResource::collection($result);
    }

    public function show(EstimateWork $product)
    {

        return new EstimateWorkDetailResource($product);
    }
}
