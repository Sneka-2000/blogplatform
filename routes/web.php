<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AuthorMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ViewController;



Route::get('/', [CommentController::class, 'blog'])->name('static.blog');
Route::get('/blogs/{id}', [CommentController::class, 'show'])->name('blogs.show');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register_user', [RegisterController::class, 'registeruser'])->name('submit.form');
Route::post('/loginform', [RegisterController::class, 'loginuser'])->name('login.form');
Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');
Route::get('/login', [RegisterController::class, 'login'])->name('login');

Route::get('/admin/dashboard', [RegisterController::class, 'dashboard'])->name('admin.dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/blog', [AdminController::class, 'blog'])->name('admin.blog');
    Route::get('/create/admin_blog', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/create/admin_blog', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/comments', [AdminController::class, 'comment'])->name('admin.comment');
    Route::patch('admin/comment/{commentId}', [AdminController::class, 'handleCommentAction'])->name('admin.action');
    Route::get('/users/update/{id}', [AdminController::class, 'update'])->name('users.update');
    Route::match(['get', 'post'], '/users/role/{id}', [AdminController::class, 'role'])->name('users.role');


});
Route::middleware(['auth', 'author'])->group(function () {
    Route::get('/author/dashboard', [AuthorController::class, 'dashboard'])->name('author.dashboard');
    Route::get('/create_blog', [AuthorController::class, 'create'])->name('author.create');
    Route::post('/create_blog', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/edit/{id}/blog', [AuthorController::class, 'edit'])->name('author.edit');
    Route::put('/update_blog/{id}', [AuthorController::class, 'update'])->name('author.update');
    Route::delete('/delete/{id}', [AuthorController::class, 'delete'])->name('author.delete');
});

Route::get('/edit_blog/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
Route::patch('/update_blog/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
Route::delete('/delete_blog/{id}', [BlogController::class, 'destroy'])->name('admin.blog.delete');
Route::post('submit-comment', [ViewController::class, 'submitComment'])->name('submit.comment');
