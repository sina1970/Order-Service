<?php

namespace App\Repositories\OrderItems;

use App\Models\OrderItem;
use App\Repositories\BaseRepository;

class OrderItemRepository extends BaseRepository implements OrderItemRepositoryInterface
{
    public function __construct(OrderItem $model){
        parent::__construct($model);
    }
}
