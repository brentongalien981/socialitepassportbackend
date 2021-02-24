<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestControllerB;
use App\Http\Controllers\TestLoginController;
use App\Http\Controllers\TestTeleSignController;

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



Route::get('/test-telesign/verify-otp', [TestTeleSignController::class, 'verifyOtp']);
Route::get('/test-telesign/get-otp', [TestTeleSignController::class, 'getOtp']);

Route::middleware('myauth')->get('/test-with-token', [TestControllerB::class, 'testWithToken']);
Route::get('/get-sample-my-auth-user', [TestControllerB::class, 'getSampleMyAuthUser']);
Route::get('/getSampleUserInfo', [TestLoginController::class, 'getSampleUserInfo']);

Route::get('/say-hello', [TestControllerB::class, 'sayHello']);



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
