<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['as'=>'admin.', 'prefix' => 'admin', 'middleware'=>['auth','admin']], function () {
    Route::get('home', [AdminController::class, 'index'])->name('home');
    Route::get('post/add', [AdminController::class, 'add'])->name('add');
    Route::post('post/store', [AdminController::class, 'store'])->name('store');
    Route::get('post/{id}', [AdminController::class, 'post'])->name('post');
    Route::get('post/{id}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::post('post/{id}/update', [AdminController::class, 'update'])->name('update');
    Route::get('post/{id}/tag', [AdminController::class, 'tag'])->name('tag');
    Route::post('post/{id}/tag/save', [AdminController::class, 'save'])->name('save');
    Route::post('post/{id}/tag/delete', [AdminController::class, 'remove'])->name('remove');
    Route::post('post/{id}/tag/add', [AdminController::class, 'new'])->name('new');
    Route::get('post/{id}/comment', [AdminController::class, 'comment'])->name('comment');
    Route::post('post/{id}/delete', [AdminController::class, 'delete'])->name('delete');
});

Route::group(['as'=>'user.', 'prefix' => 'user', 'middleware'=>['auth','user']], function () {
    Route::get('home', [UserController::class, 'index'])->name('home');
    Route::get('post/{id}', [UserController::class, 'post'])->name('post');
    Route::get('post/{id}/comment', [UserController::class, 'comment'])->name('comment');
    Route::post('post/{id}/comment/store', [UserController::class, 'store'])->name('store');
});

Route::get('/profile', [ProfileController::class, 'index'])->name('indexProfile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('editProfile');
Route::post('/profile/store', [ProfileController::class, 'store'])->name('storeProfile');
Route::get('/profile/change-password', [ProfileController::class, 'changePassword'])->name('changePasswordProfile');
Route::post('/profile/save-password', [ProfileController::class, 'savePassword'])->name('savePasswordProfile');
