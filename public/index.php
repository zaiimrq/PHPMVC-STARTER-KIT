<?php

require_once __DIR__ . '/../vendor/autoload.php';

use zaiimrq\Facade\Route;
use zaiimrq\Http\Controllers\HomeController;



Route::register('GET', '/([0-9]*)', [HomeController::class, 'index']);
Route::boot();
