<?php

namespace App\Http\Controllers\Admin\V1;

use App\ApiResponse;
use App\Enums\OrderStatusEnum;
use App\Services\Admin\V1\OrderService;
use Illuminate\Http\Request;

class OrderController
{
    public function __construct(public OrderService $orderService) {}

    public function updatOrderStatus(int $id, Request $request)
    {
        $this->orderService->updateOrderStatus($id, OrderStatusEnum::from($request->status));
        return ApiResponse::success("order status changed");
    }
}
