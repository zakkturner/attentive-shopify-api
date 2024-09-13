<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    $shop = Auth::user();

    return ['Laravel' => app()->version(), 'Shop' => $shop];
})->middleware('verify.shopify')->name('home');

require __DIR__.'/auth.php';
