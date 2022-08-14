<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
Route::get('/userlist', [UserController::class, 'userlist'])->name('userlist');
Route::get('/home', [UserController::class, 'home'])->name('home');
Route::post('/save', [UserController::class, 'save'])->name('save');
