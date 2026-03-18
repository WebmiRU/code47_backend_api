<?php

use App\Http\Controllers\Auth\DockerRegistryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::group(['as' => 'auth.', 'prefix' => 'auth'], function () {
    Route::group(['prefix' => 'docker-registry', 'as' => 'docker-registry.'], function () {
        Route::get('/', [DockerRegistryController::class, 'index'])->name('index');
    });
});
