<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DeviceController;

Route::get('/', [DeviceController::class, 'getData']);
Route::get('/tablets', [DeviceController::class, 'showData']);
