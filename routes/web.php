<?php

use Illuminate\Support\Facades\Route;
use App\Models\Tweet;
use App\Models\User;
use App\Http\Controllers\TweetsController;

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


Route::middleware('auth')->group(function () {
    Route::post('/tweets', [TweetsController::class, 'store']);
    Route::get('/tweets', [TweetsController::class, 'index'])->name('home');

});

Route::get('/home', function () {
    return view('home', [
        'tweets' => auth()->user()->timeline()
    ]);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
