<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

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

Auth::routes();

Route::view('/profile/tasks/', 'profile');
Route::view('/profile/tasks/items/create', 'profile');
Route::view('/profile/tasks/edit/{id}', 'profile');
Route::view('/profile/edit', 'profile');
Route::view('/profile/avatar', 'profile');

Route::get('/', [ FileController::class, 'index' ]);