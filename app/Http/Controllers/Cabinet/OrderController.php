<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        dd(backpack_auth()->user()->roles);
        dd($request->user('backpack'));
        dd('A!!!', backpack_user(), backpack_auth()->user()->name, backpack_auth()->check());
    }
}
