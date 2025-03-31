<?php

namespace App\Services;

use App\Enums\OrderStatusEnum;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderEvents\OrderEventRepositoryInterface;
use App\Repositories\OrderItems\OrderItemRepositoryInterface;
use App\ThirdParty\InventoryFacade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Decimal;
use Throwable;

class OrderService
{
    public function __construct(
        public OrderRepositoryInterface $orderRepository,
        public OrderItemRepositoryInterface $orderItemRepository,
        public OrderEventRepositoryInterface $orderEventRepository,
    ) {}

    public function findOrder(int $id): ?Model
    {
        return $this->orderRepository->find($id);
    }

    public function cereateOrder(int $customerId, array $productLists): Model
    {

        try {
            DB::beginTransaction();
            $totalPrice = 0;
            $productsData = InventoryFacade::getManyProductsData($productLists);
            $totalPrice = $this->getTotalPrice($productLists, $productsData["data"]);

            $order =  $this->orderRepository->create([
                "uuid" => Str::uuid(),
                "customer_id" => $customerId,
                "total_price" => $totalPrice,
                "status" => OrderStatusEnum::PENDING->value
            ]);

            //create order item with each product price and quantity
            foreach ($productLists as $productList) {
                $this->orderItemRepository->create([
                    'order_id' => $order->id,
                    'product_id' => $productList['productId'],
                    'quantity' => $productList['quantity'],
                    'price' => $this->getSingleProductPrice($productsData, $productList["productId"])
                ]);
            }

            $this->orderEventRepository->create([
                "order_id" => $order->id,
                "status" => OrderStatusEnum::PENDING->value,
                "payload" => json_encode("customeId = $customerId"),
            ]);

            DB::commit();
            return $order;
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function getTotalPrice(array $productLists, array $productsData): float|int
    {
        $productMap = array_column($productsData, 'price', 'id');
        return array_reduce($productLists, function ($carry, $product) use ($productMap): float|int {
            return $carry + ($productMap[$product["productId"]] ?? 0) * $product['quantity'];
        }, 0);
    }

    public function getSingleProductPrice(array $productsData, $productId): int|float
    {
        $price = 0;
        foreach ($productsData["data"] as $item) {
            if ($item["id"] == $productId) {
                $price = $item["price"];
                break;
            }
        }
        return $price;
    }

    
}
