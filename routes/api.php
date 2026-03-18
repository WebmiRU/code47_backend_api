<?php

use App\Http\Controllers\Auth\DockerRegistryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::group(['as' => 'auth.', 'prefix' => 'auth'], function () {
    Route::group(['prefix' => 'docker-registry', 'as' => 'docker-registry.'], function () {
        Route::get('pull', [DockerRegistryController::class, 'pull'])->name('pull');
        Route::get('push', [DockerRegistryController::class, 'push'])->name('push');
    });
});
