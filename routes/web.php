<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/accueil', function () {
    return view('accueil');
})->name('accueil'); 

Route::get('/reservation/{name}', function ($name) {
    // traitement des données
    $name = '"'.$name.'"';

    return view('reservation', [
        // passage de variables à une vue
        'name' => $name,
    ]);
})->name('reservation');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/mentions-legales', function () {
    return view('mentions-legales');
})->name('mentions-legales');