<?php

use App\Http\Controllers\ComentarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

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

// Ruta del index
Route::get('/', function () {
    return view('principal');
});

// Rutas para crear una cuentra index y store
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Rutas para login y logout
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']); 
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Ruta para autenticar al usuario Route Model Binding
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
// Ruta para crear posts del usuario
Route::get('/post/create', [PostController::class, 'create'])->name('posts.create');
// Ruta para almacenar los posts del usuario
Route::post('/post', [PostController::class, 'store'])->name('posts.store');
// Ruta para obtener el post y mostrarlo. {post} mapea e identifica el post sobre el que se está pulsando
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Ruta para eliminar un post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Ruta para alamacenar comentarios
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');

// Ruta para subir imagenes (posts del usuario)
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

// Ruta para agregar likes
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');