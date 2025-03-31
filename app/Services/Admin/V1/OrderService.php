<?php

namespace App\Services\Admin\V1;

use App\Enums\OrderStatusEnum;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderEvents\OrderEventRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Throwable;

class OrderService
{
    public function __construct(
        public OrderRepositoryInterface $orderRepository,
        public OrderEventRepositoryInterface $orderEventRepository,
    ){}

    public function updateOrderStatus(int $id, OrderStatusEnum $orderStatus)
    {
        try{
            DB::beginTransaction();
            $this->orderRepository->update($id, [
                "status" => $orderStatus->value
            ]);


            $this->orderEventRepository->create([
                "order_id" => $id,
                "status" => $orderStatus->value,
                "payload" => json_encode("ad")
            ]);
            DB::commit();
        }catch(Throwable $e){
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
