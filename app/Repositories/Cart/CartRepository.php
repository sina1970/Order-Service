<?php

namespace App\Repositories\Cart;

use App\Repositories\BaseRepository;
use App\Repositories\Cart\CartRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}
