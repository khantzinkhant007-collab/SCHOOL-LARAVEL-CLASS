<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kadai03Controller;
use App\Http\Controllers\Kadai02Controller;
use App\Http\Controllers\Kadai02_3Controller;
use App\Http\Controllers\Kadai02_4Controller;
use App\Http\Controllers\Sample04Controller;
use App\Http\Controllers\Kadai04Controller;
use App\Http\Controllers\Sample06Controller;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Kadai02_2Controller;
use App\Http\Controllers\Kadai12Controller;
use App\Http\Controllers\Sample02_1Controller;
use App\Http\Controllers\Sample02_2Controller;
use App\Http\Controllers\Sample02_3Controller;







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
    return redirect()->route('kadai12_1.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// sample02
Route::get('/sample02_1', [Sample02_1Controller::class, 'index'])
    ->name('sample02_1');

Route::get('/sample02_2', [Sample02_2Controller::class, 'index'])
    ->name('sample02_2');

Route::get('/sample02_3', [Sample02_3Controller::class, 'index'])
    ->name('sample02_3');

//kadai03
Route::get('/kadai03',[Kadai03Controller::class, 'index']);

Route::get('/kadai03/registration', [Kadai03Controller::class, 'create']);

Route::get('/kadai03/detail', [Kadai03Controller::class, 'show']);

Route::get('/kadai03/editing', [Kadai03Controller::class, 'edit']);

Route::get('/kadai02', [Kadai02Controller::class, 'index']);

Route::get('/kadai02_2', [Kadai02_2Controller::class, 'index']);


Route::get('/kadai02_3', [Kadai02_3Controller::class, 'index']);

Route::get('/kadai02_4', [Kadai02_4Controller::class, 'index']);

Route::get('/Sample04', [Sample04Controller::class, 'index']);

Route::post('/Sample04', [Sample04Controller::class, 'post']);


//kadai04
Route::get('/kadai04', [Kadai04Controller::class, 'index'])
    ->name('kadai04.index');

Route::post('/kadai04', [Kadai04Controller::class, 'post'])
    ->name('kadai04.post');

Route::get('/kadai04/confirm', [Kadai04Controller::class, 'confirm'])
    ->name('kadai04.confirm');

Route::post('/kadai04/back', [Kadai04Controller::class, 'back'])
    ->name('kadai04.back');

Route::post('/kadai04/complete', [Kadai04Controller::class, 'complete'])
    ->name('kadai04.complete');

Route::resource('sample06', Sample06Controller::class);


Route::resource('articles', ArticlesController::class);

Route::get('/kadai12_1', [Kadai12Controller::class, 'index'])
    ->name('kadai12_1.index');

Route::post('/kadai12_1', [Kadai12Controller::class, 'store'])
    ->middleware('auth')
    ->name('kadai12_1.store');
