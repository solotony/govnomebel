<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    public function take(Request $request)
    {
        \Log::info('Order\take', $request->all());

        return $this->sendResponse([], 'Ok');
        //return $this->sendError('dfdsf', 'text Errors1');
    }
}
