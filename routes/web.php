<?php

use App\Http\Controllers\Test;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SocialShareController;
use App\Http\Controllers\NotificationController;

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



  Auth::routes();

 Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/cours', [App\Http\Controllers\HomeController::class, 'cours'])->middleware('auth')->name('cours');
Route::get('/lesson', [App\Http\Controllers\HomeController::class, 'lesson'])->name('lesson');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{id}', [App\Http\Controllers\HomeController::class, 'showByCat'])->name('home.cat');

Route::post('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('post.search');

Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::get('/ajouter-annoce', [App\Http\Controllers\PostController::class, 'create'])->middleware('auth')->name('post.create');
Route::post('/ajouter-annoce', [App\Http\Controllers\PostController::class, 'store'])->middleware('auth')->name('post.store');
Route::get('/editer-annoce/{id}', [App\Http\Controllers\PostController::class, 'createEdit'])->middleware('auth')->name('post.edit');
Route::get('/supprimer-annoce/{id}', [App\Http\Controllers\PostController::class, 'deletePost'])->middleware('auth')->name('post.delete');
Route::post('/editer-annoce', [App\Http\Controllers\PostController::class, 'updatePost'])->middleware('auth')->name('post.update');

Route::get('/category', [App\Http\Controllers\PostController::class, 'createCat'])->middleware('auth')->name('cat.create');
Route::Post('/category', [App\Http\Controllers\PostController::class, 'storeCat'])->middleware('auth')->name('cat.store');


Route::Post('/post-comment', [App\Http\Controllers\PostController::class, 'storeComment'])->middleware('auth')->name('comment.store');

Route::Post('/like', [App\Http\Controllers\HomeController::class, 'likePost'])->middleware('auth')->name('posts.like');


Route::get('/notification/{post_id}/{not_id}', [App\Http\Controllers\NotificationController::class, 'index'])->middleware('auth')->name('notification.read');


Route::get('/editor/{id}', [App\Http\Controllers\EditorController::class, 'index'])->middleware('auth')->name('editor');
Route::get('/delete-editor/{id}', [App\Http\Controllers\EditorController::class, 'deleteEditor'])->middleware('auth')->name('editor.delete');

Route::get('/edit-cat', [App\Http\Controllers\CategoryController::class, 'index'])->middleware('auth')->name('cat.edit');



// Route::get('social-share', [SocialShareController::class, 'index'])->name('share');
// Route::view('/generate-slug', 'livewire.welcome');

// require __DIR__.'/auth.php';