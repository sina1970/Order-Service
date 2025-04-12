<?php

namespace App\Http\Controllers\Client\V1;

use App\Http\Controllers\Controller;
use App\Services\Client\V1\CartService;

class CartController extends Controller
{
    public function __construct(public CartService $cartService)
    {

    }

    public function addToCart(){
        //create cart if doesn't exist and add item
        // if exists add item to it
    }

    public function removeItem(){

    }

    public function getCart()
    {
        //if user is logged in
    }
}
