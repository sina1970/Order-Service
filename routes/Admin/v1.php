<?php

use App\Http\Controllers\Admin\V1\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){

    Route::put('update-status/{id}',[OrderController::class,'updatOrderStatus']);

});
