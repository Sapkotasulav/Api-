<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//  php artisan make:model test -m

Route::post('/insert', [Controller::class, 'insertApi']);
Route::get('/show', [Controller::class, 'showData']);