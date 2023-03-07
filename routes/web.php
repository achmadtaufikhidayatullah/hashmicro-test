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
 return redirect()->route('dashboard.index');
});

Route::prefix('admin')->middleware('auth')->group(function(){
   // HOME
   Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard.index');

   // USER
   Route::resource('user', App\Http\Controllers\UserController::class);

   // TEST
   Route::resource('test', App\Http\Controllers\TestController::class);
   
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
