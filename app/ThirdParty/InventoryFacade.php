<?php

namespace App\ThirdParty;

use Illuminate\Support\Facades\Facade;
/**
 * @method static array changeProductStock(array $inventoryData, string $type)
 * @method static array getManyProductsData(array $productLists)
 */
class InventoryFacade extends Facade
{

    protected static function getFacadeAccessor():string
    {
        return InventoryClient::class;
    }
}
