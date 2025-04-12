<?php

namespace App\Http\Controllers\Client\V1;

use App\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\Client\V1\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(public OrderService $orderService) {}

    public function findOrder(int $id)
    {
        $response = $this->orderService->findOrder($id);
        return ApiResponse::success("success", $response);
    }

    public function createOrder(Request $request)
    {
        $response = $this->orderService->cereateOrder($request->customerId, $request->productLists);
        return ApiResponse::success("success", $response);
    }
}
