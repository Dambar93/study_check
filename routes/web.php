<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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
Route::get('/index', [NewsController::class, 'index']);
Route::get('/news', [NewsController::class, 'list']);
Route::get('/news/create', [NewsController::class, 'create']);
Route::post('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::delete('news/delete/{news}', [NewsController::class, 'destroy'])->name('news.delete');
Route::get('/show/{news}', [NewsController::class, 'show']);
Route::match(['get','post'],'news/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');