<?php

use App\Http\Controllers\UserCotroller;
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
    return view('login');
});




Route::post('login',[UserCotroller::class,'CheckLogin']);
Route::post('setbank',[UserCotroller::class,'setbank']);
Route::post('setincome',[UserCotroller::class,'setincome']);
Route::post('setexpense',[UserCotroller::class,'setexpense']);
Route::post('updatein',[UserCotroller::class,'Updatein']);
Route::post('updateex',[UserCotroller::class,'Updateex']);
Route::post('deletein',[UserCotroller::class,'Deletein']);
Route::post('deleteex',[UserCotroller::class,'Deleteex']);

Route::get('report',[UserCotroller::class,'report']);
Route::get('setbank',[UserCotroller::class,'option']);
Route::get('income',[UserCotroller::class,'income']);
Route::get('expense',[UserCotroller::class,'expense']);
