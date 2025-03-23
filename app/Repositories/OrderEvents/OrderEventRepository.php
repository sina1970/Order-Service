<?php

namespace App\Repositories\OrderEvents;

use App\Models\OrderEvent;
use App\Repositories\BaseRepository;

class OrderEventRepository extends BaseRepository implements OrderEventRepositoryInterface
{
    public function __construct(OrderEvent $model){
        parent::__construct($model);
    }
}
