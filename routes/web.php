<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CuentaController;

Route::get('/', function () {
    return redirect()->route('clientes.index');
});

Route::resource('clientes', ClienteController::class); //
Route::resource('cuentas', CuentaController::class); //