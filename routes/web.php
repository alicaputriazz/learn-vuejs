<?php

use Illuminate\Support\Facades\Route;

Route::view('/{any}', 'app')->where('any', '.*');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
