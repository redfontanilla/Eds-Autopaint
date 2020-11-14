<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaintJobController;
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
    return view('pages.newPaintJob');
});

Route::get('/paint_job', function () {
    return view('pages.paintJob');
});

Route::get('/show_paint_job', [PaintJobController::class, 'showPaintJob'] )
->name('show.paint.job');

Route::post('/create_paintJob', [PaintJobController::class, 'createPaintJob'] )
->name('create.paint.job');

Route::get('/show_shop_performance', [PaintJobController::class, 'showShopPerformance'] )
->name('show.shop.performance');

Route::post('/paintJob_create',[PaintJobController::class, 'createPaintJob'] )
        ->name('paintJob.create');