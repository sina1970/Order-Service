<?php

namespace App\Services;

use App\OrderStatusEnum;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OrderService
{
    public function __construct(public OrderRepositoryInterface $orderRepository){}

    public function findOrder(int $id){
        return $this->orderRepository->find($id);
    }

    public function cereateOrder(int $customer_id , array $product_lists):Model{
        $total_price= 0;
        foreach ($product_lists as $product_list){
            //get product data from inventory service
        }

        return $this->orderRepository->create([
            "uuid" => Str::uuid(),
            "customer_id" => $customer_id,
            "total_price" => $total_price,
            "status" => OrderStatusEnum::PENDING->value
        ]);
    }

}
