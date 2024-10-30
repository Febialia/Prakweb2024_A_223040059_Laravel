<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Febi Alia Rahman']);
});

// buat 2 buat rute baru
// 1. /blog
// 1 buah artikel, judul dan isi

// 2. /contact
// email/social media