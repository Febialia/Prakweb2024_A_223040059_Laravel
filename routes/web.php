<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Febi Alia Rahman', 'title' => 'Contact']);
});

Route::get('/posts', function () {
    return view('posts',  ['title' => 'Blog', 'posts' => Post::filter(request([
        'search',
        'category',
        'author'
    ]))->latest()->paginate(6)]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    return view('posts', ['title' => count($user->posts) . 'Articles by' .
        $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {

    return view('posts', ['title' => ' Articles in: ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');;
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');;
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index', ['title' => 'Dashboard']);
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
