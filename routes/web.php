<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Febi Alia Rahman','title' => 'about']);
});

Route::get('/blog', function () {
    $title = "Blog Page Title"; // Isi variabel title
    return view('blog', compact('title'));
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

