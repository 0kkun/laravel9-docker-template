<?php

use Illuminate\Support\Facades\Route;

// Route::get('/top/{any}', function () {
//     return view('app');
// })->where('any', '.*');

Route::get('/top', function () {
    return view('app');
});