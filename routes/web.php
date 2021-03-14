<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Controllers\HomeController;

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
    // $user = User::find(1);
    // $now = Carbon::now();
    // $donate = Carbon::parse($user->last_donated);

    // dd($donate->diffForHumans());
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/list', [HomeController::class, 'list'])->name('list');

Route::get('/edit/{id}', [HomeController::class, 'edit'])->middleware('auth');

Route::post('/edit/{id}', [HomeController::class, 'update'])->middleware('auth');
