<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

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

// 一覧表示
Route::get('/',[CrudController::class,'index'])->name('posts.index');


Route::get('/create',[CrudController::class,'create'])->name('posts.create');
Route::post('/create',[CrudController::class,'store'])->name('posts.store');

Route::get('/edit/{id}',[CrudController::class,'edit'])->name('posts.edit');
Route::post('/update/{id}',[CrudController::class,'update'])->name('posts.update');
Route::get('/destroy/{id}',[CrudController::class,'destroy'])->name('posts.destroy');
Route::post('/destroy/{id}',[CrudController::class,'destroy'])->name('posts.dest');





