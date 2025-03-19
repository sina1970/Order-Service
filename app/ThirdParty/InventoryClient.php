<?php

namespace App\ThirdParty;

use Illuminate\Support\Facades\Http;

class InventoryClient
{
    protected string $uri;
    public function __construct()
    {
        $this->uri = config('services.inventory.url');
    }

    public function changeProductStock(array $inventoryData, string $type)
    {
        $url = $this->uri.'api/change-stock';
        $body = [
            'inventoryData' => $inventoryData,
            'type' => $type
        ];

        $response = Http::withoutVerifying()->post($url, $body);
        if(!$response->successful()){
            throw new \Exception("ridi");
        }
        return $response->json();
    }

    public function getProductData()
    {

    }
}
