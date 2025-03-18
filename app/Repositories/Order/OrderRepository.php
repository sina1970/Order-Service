<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepository;
class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function __construct(public Order $model) {
        parent::__construct($model);
    }

}
