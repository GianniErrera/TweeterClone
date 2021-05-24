<?php

// DB::listen(function ($query) { var_dump($query->sql, $query->bindings, $query->time); });

use Illuminate\Support\Facades\Route;
use App\Models\Tweet;
use App\Models\User;
use App\Http\Controllers\TweetsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\FollowsController;

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

    Route::post('/profiles/{user:name}/follow', [FollowsController::class, 'store']);

});

Route::get('/profiles/{user:name}', [ProfilesController::class, 'show'])->name('profile');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
