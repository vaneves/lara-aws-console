<?php

use App\Http\Controllers\Sqs\ListPaginatedQueueController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/sqs', [ListPaginatedQueueController::class, 'view'])->name('sqs');
