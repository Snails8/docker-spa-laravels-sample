<?php

use App\Http\Controllers\Api\Admin\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 管理画面の機能として実装するためPrefixにadminをつける
Route::prefix('admin')->group(function() {
    // 認証処理
    Route::prefix('ayth')->group(function () {
        Route::post(('/login', [LoginController::class, 'login']);
        });

        Route::middleware('auth:api')->group(function () {
            Route::get('/user', function () {
                return Auth::user();
            });

            // Users
            Route::resource('users', UserContorller::class)->only([
                'index']);
        });
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
