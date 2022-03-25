<?php

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

use Illuminate\Support\Facades\Route;
use Modules\ModuleExample\app\Http\Controllers\Item1\ItemOneController;
use Modules\ModuleExample\app\Http\Controllers\Item2\ItemTwoController;
use Modules\ModuleExample\app\Http\Middleware\ItemActiveMiddlewarre;

Route::prefix('moduleexample')->group(function() {
    Route::get('/', 'ModuleExampleController@index');
    Route::prefix('item-one')->middleware([ItemActiveMiddlewarre::class])->group(function () {
        Route::get('/', [ItemOneController::class, 'index']);
    });
    Route::prefix('item-two')->middleware([ItemActiveMiddlewarre::class])->group(function () {
        Route::get('/', [ItemTwoController::class, 'index']);
    });
});
