<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\v1\PlateauController;
use App\Http\Controllers\v1\RoverController;

Route::group(['prefix' => 'v1'], function() {

    Route::group(['prefix' => 'plateau'], function () {
        Route::post('/', [PlateauController::class, 'create']);
        Route::get('/', [PlateauController::class, 'store']);
        Route::get('/{plateauId}', [PlateauController::class, 'getFromId']);
    });

    Route::group(['prefix' => 'rover'], function () {
        Route::post('/', [RoverController::class, 'create']);
        Route::get('/', [RoverController::class, 'store']);
        Route::get('/{roverId}', [RoverController::class, 'getFromId']);
        Route::post('/sendCommands', [RoverController::class, 'sendCommands']);
    });

});
