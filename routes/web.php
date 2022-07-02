<?php

use Illuminate\Support\Facades\Route;

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

Route::get('index',[\App\Http\Controllers\ContentController::class,'index'])->name('index');

Route::get('ClientMsg',[\App\Http\Controllers\ContentController::class,'ClientMsg'])->name('ClientMsg');

Route::get('add',[\App\Http\Controllers\ContentController::class,'add'])->name('add');

Route::get('command/{id}/{status}',[\App\Http\Controllers\ContentController::class,'commandStatus'])->name('updateStatus');

Route::get('commandMode/{id}/{status}',[\App\Http\Controllers\ContentController::class,'commandStrict'])->name('updateStatus');

Route::post('insertCommand',[\App\Http\Controllers\ContentController::class,'insertCommand'])->name('insertCommand');

Route::post('insertReply',[\App\Http\Controllers\ContentController::class,'insertReply'])->name('insertReply');

Route::post('delCommand/{id}',[\App\Http\Controllers\ContentController::class,'delCommand'])->name('delCommand');
