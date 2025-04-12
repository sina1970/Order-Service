<?php

namespace App\Http\Controllers\Client\V1;

use App\Http\Controllers\Controller;
use App\Services\Client\V1\CartService;

class CartController extends Controller
{
    public function __construct(public CartService $cartService)
    {

    }
}
