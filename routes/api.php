<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\Catalog\ItemController;
use Illuminate\Support\Facades\Route;

// Сейчас такая структура не нужна, но для настоящего проекта она будет нужна
Route::group(['prefix' => 'catalog', 'as' => 'catalog.'], function () {
    Route::group(['prefix' => 'items', 'as' => 'items.'], function () {
        Route::get('', [ItemController::class, 'list'])->name('list');
    });
});
