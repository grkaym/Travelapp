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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('app/mypage');
// });

Route::get('/', [App\Http\Controllers\MypageController::class, 'index']);
Route::get('/timeline', [App\Http\Controllers\TimelineController::class, 'index']);
Route::get('/post', [App\Http\Controllers\CreateController::class, 'index']);

// ajax
Route::post('/ajax/addContent', [App\Http\Controllers\TimelineController::class, 'ajaxAddContent']);

// 認証
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
