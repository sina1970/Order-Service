<?php

namespace App\ThirdParty;

use Illuminate\Support\Facades\Facade;

class InventoryFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return InventoryClient::class;
    }
}
