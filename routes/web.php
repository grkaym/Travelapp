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

// mypage
Route::get('/', [App\Http\Controllers\MypageController::class, 'index']);

// timeline
Route::get('/timeline', [App\Http\Controllers\TimelineController::class, 'index']);

// create post
Route::get('/create', [App\Http\Controllers\CreateController::class, 'index']);

// edit post
Route::get('/edit/{id?}', [App\Http\Controllers\CreateController::class, 'edit']);
Route::post('/edit/{id?}', [App\Http\Controllers\CreateController::class, 'create']);
Route::post('/edit/add_tag/{post_id?}', [App\Http\Controllers\CreateController::class, 'addTag']);
Route::get('/edit/add_day/{post_id?}', [App\Http\Controllers\CreateController::class, 'addDay']);
Route::get('/edit/remove_day/{post_id?}', [App\Http\Controllers\CreateController::class, 'removeDay']);
Route::post('/edit/spot/{id?}', [App\Http\Controllers\CreateController::class, 'spot']);
Route::post('/edit/spot/add/{id?}', [App\Http\Controllers\CreateController::class, 'add']);
Route::post('/edit/spot/add_image/{id?}', [App\Http\Controllers\CreateController::class, 'addImage']);

// post detail
Route::get('/detail/{id?}', [App\Http\Controllers\DetailController::class, 'index']);

// search
Route::get('/search/{keyword?}', [App\Http\Controllers\SearchController::class, 'index']);
Route::get('/search/tag/{keyword?}', [App\Http\Controllers\SearchController::class, 'searchByTag']);

// userlist
Route::get('/list', [App\Http\Controllers\ListController::class, 'index']);
Route::get('/delete_user', [App\Http\Controllers\ListController::class, 'delete']);
Route::get('/restore_user', [App\Http\Controllers\ListController::class, 'restore']);

// ajax
Route::post('/ajax/addContent', [App\Http\Controllers\TimelineController::class, 'ajaxAddContent']);

// 認証
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
