<?php

namespace App\Http\Controllers\Client\V1;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(public OrderService $orderService){}

    public function createOrder(Request $request){
        $response = $this->orderService->cereateOrder($request->customer_id, $request->product_lists);
    }
}
