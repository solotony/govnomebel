<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function order(Request $request)
    {
        \Log::info('User@order', $request->all());

        return $this->sendResponse(['user' => ['id' => 1]], 'Ok');
    }
}
