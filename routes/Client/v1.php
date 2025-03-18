<?php

use App\Http\Controllers\Client\V1\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('order')->group(function() {

    Route::get('find/{id}', [OrderController::class,'findOrder']);
});