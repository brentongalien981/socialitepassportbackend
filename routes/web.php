<?php

use App\Http\Controllers\TestLoginController;
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



Route::get('/login', [TestLoginController::class, 'redirectToProvider']);
Route::get('/receive-socialite-auth-code', [TestLoginController::class, 'handleProviderCallback']);



Route::get('/', function () {
    return view('welcome');
});
