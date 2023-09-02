<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JsonDataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $data['sessionUser'] = Session::get('sessionUser') ?? "";
    $data['sessionUserAddress'] = Session::get('sessionUserAddress') ?? "";
    $data['databaseUser'] = User::get();
    return view('welcome', $data);
});
Route::controller(JsonDataController::class)->prefix('data')->name('data.')->group(function () {
    Route::any('create', 'create')->name('create');
    Route::any('store', 'store')->name('store');
    Route::any('view', 'view')->name('view');
});


Route::resource('users', UserController::class);
