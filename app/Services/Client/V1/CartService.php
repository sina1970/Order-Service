<?php

namespace App\Services\Client\V1;

use App\Repositories\Cart\CartRepositoryInterface;

class CartService
{
    public function __construct(public CartRepositoryInterface $cartRepository){

    }
}
