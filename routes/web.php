<?php

use Illuminate\Support\Facades\Route;

// Apunta directamente a tu archivo resources/views/index.blade.php
Route::view('/', 'login');
Route::view('/login', 'login');
