<?php

use App\Http\Controllers\BukuTamuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('buku-tamu.index');
});

Route::resource('buku-tamu', BukuTamuController::class);