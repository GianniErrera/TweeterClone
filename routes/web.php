<?php

// DB::listen(function ($query) { var_dump($query->sql, $query->bindings, $query->time); });

use Illuminate\Support\Facades\Route;
use App\Models\Tweet;
use App\Models\User;
use App\Http\Controllers\TweetsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\LikesController;

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

    Route::post('/profiles/{user:username}/follow', [FollowsController::class, 'store']);
    Route::post('/profiles/{user:username}/unfollow', [FollowsController::class, 'destroy']);
    Route::patch(
        '/profiles/{user:username}',
         [ProfilesController::class, 'update']
    )->middleware('can:edit,user');
    Route::get(
        '/profiles/{user:username}/edit',
         [ProfilesController::class, 'edit']
    )->middleware('can:edit,user');

    Route::post('/tweets/{tweet}/like/{liked}', [LikesController::class, 'like']);
    Route::post('/tweets/{tweet}/dislike/{liked}', [LikesController::class, 'dislike']);

});
Route::get('/test', [TweetsController::class, 'test']);
Route::get('/profiles/{user:username}', [ProfilesController::class, 'show'])->name('profile');

Route::get('/explore', ExploreController::class);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
