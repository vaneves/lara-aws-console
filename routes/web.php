<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Sqs\ListPaginatedQueueController;
use App\Http\Controllers\Sqs\ViewQueueDetailsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'view'])->name('home');

Route::get('/sqs', [ListPaginatedQueueController::class, 'view'])->name('sqs');
Route::get('/sqs/{name}', [ViewQueueDetailsController::class, 'view'])->name('sqs.view');

Route::get('/sns', fn () => 'not implemented')->name('sns');
Route::get('/s3', fn () => 'not implemented')->name('s3');