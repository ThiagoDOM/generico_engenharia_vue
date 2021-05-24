<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
});

require __DIR__.'/auth.php';

Route::apiResource('/clientes', ClienteController::class);

//Route::apiResource('clientes', 'ClienteController');