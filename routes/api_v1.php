<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\AttentiveSubController;
//Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::post('/attentive-sub', AttentiveSubController::class);