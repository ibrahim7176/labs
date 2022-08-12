<?php



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


use App\Http\Controllers\postController;
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


//
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


Route::get('/posts', [postController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [postController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts', [postController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [postController::class, 'show'])->where(['id' => '[0-9]+'])->name('posts.show');
Route::get('posts/restore/', [postController::class, 'restore'])->name('posts.restore');
Route::get('/posts/{id}/edit', [postController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [postController::class, 'update'])->name('posts.update')->middleware('auth');
Route::delete('/posts/{id}', [postController::class, 'destroy'])->name('posts.destroy');


Route::fallback(function () {
    return '<h1>Something went wrong pleas try again</h1>';
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
