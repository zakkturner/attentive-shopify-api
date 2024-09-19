<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
//    $shop = Auth::user();

    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
