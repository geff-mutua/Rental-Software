<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Payments\MPESAResponseController;


Route::group(['prefix' => 'v1/2384/merchant/rnt/555/notify'], function () {
    Route::post('validation',[MPESAResponseController::class,'validation']);
    Route::post('confirmation',[MPESAResponseController::class,'confirmation']);
});
