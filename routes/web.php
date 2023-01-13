<?php

use App\Http\Middleware\RejectMiddleware;
use Illuminate\Support\Facades\Route;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
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
Route::get('/', [App\Http\Controllers\MypageController::class, 'index'])->middleware(RejectMiddleware::class);
Route::get('/other/{id}', [App\Http\Controllers\MypageController::class, 'other']);

// timeline
Route::get('/timeline', [App\Http\Controllers\TimelineController::class, 'index']);

// create post
Route::get('/create', [App\Http\Controllers\CreateController::class, 'index']);

// edit post
Route::get('/edit/{id?}', [App\Http\Controllers\CreateController::class, 'edit']);
Route::post('/edit/{id?}', [App\Http\Controllers\CreateController::class, 'create']);
Route::post('/edit/delete/{post_id}', [App\Http\Controllers\CreateController::class, 'postDelete']);
Route::post('/edit/add_tag/{post_id}', [App\Http\Controllers\CreateController::class, 'addTag']);
Route::get('/edit/add_day/{post_id}', [App\Http\Controllers\CreateController::class, 'addDay']);
Route::get('/edit/remove_day/{post_id}', [App\Http\Controllers\CreateController::class, 'removeDay']);
Route::get('/edit/spot/{id}', [App\Http\Controllers\CreateController::class, 'spot']);
Route::post('/edit/spot/{id}', [App\Http\Controllers\CreateController::class, 'spot']);
Route::post('/edit/spot/add/{id}', [App\Http\Controllers\CreateController::class, 'add']);
Route::post('/edit/spot/delete/{id}', [App\Http\Controllers\CreateController::class, 'spotDelete']);
Route::post('/edit/spot/add_image/{id}', [App\Http\Controllers\CreateController::class, 'addImage']);
Route::get('/rename', [App\Http\Controllers\CreateController::class, 'rename']);
Route::post('/rename', [App\Http\Controllers\CreateController::class, 'rename']);
Route::post('/update_spot', [App\Http\Controllers\CreateController::class, 'updateSpot']);

// post complete
Route::get('/complete', [App\Http\Controllers\CreateController::class, 'complete']);

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
Route::post('/ajax/like/{post_id?}', [App\Http\Controllers\LikeController::class, 'index']);

// 認証
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\MypageController::class, 'logout']);


// パスワードリセット
// 忘れたを押した時のビュー
Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');

// 忘れたビューからのリクエストを処理するルート
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

// 送信されたリンクをクリックしたときのビュー
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

// パスワードを処理するルート
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');