<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\Sample\SampleController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('Sample')->group(function () {
    Route::get('/sample', [SampleController::class, 'index'])->name('sample');
    Route::get('/sample/other', [SampleController::class, 'other']);
});

// test用
Route::get('/test', [TestController::class, 'index']);
Route::post('/test', [TestController::class, 'index']);

Route::get('/hello/{id}', [HelloController::class, 'index']);
// Route::get('/hello/other', [HelloController::class, 'other']);
// Route::get('/hello', [HelloController::class, 'index'])->name('hello');