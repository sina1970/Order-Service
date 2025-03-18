<?php

namespace App\Services;

use App\OrderStatusEnum;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OrderService
{
    public function __construct(public OrderRepositoryInterface $orderRepository){}

    public function findOrder(int $id):Model{
        return $this->orderRepository->find($id);
    }

    public function cereateOrder(int $customerId , array $productLists):Model{
        $totalPrice= 0;
        foreach ($productLists as $productList){
            //get product data from inventory service
        }

        return $this->orderRepository->create([
            "uuid" => Str::uuid(),
            "customer_id" => $customerId,
            "total_price" => $totalPrice,
            "status" => OrderStatusEnum::PENDING->value
        ]);
    }

    public function getProductsData(array $productIds):array {
        //send request to inventory service and get the product data
    }

    public function updateOrderStatus(int $id, OrderStatusEnum $orderStatus){
        $this->orderRepository->update($id, [
            "status" => $orderStatus->value
        ]);
    }

}
