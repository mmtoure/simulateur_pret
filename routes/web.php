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

Route::group(['middleware' => ['get.menu']], function () {
    Route::get('/', function () { return view('landing_page'); });
    Route::get('/dashboard', function () {  return view('dashboard.homepage'); });
    Route::resource('notes', 'NotesController');
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('produits', 'ProduitController');
    Auth::routes();

});

Route::get('/simulateur_pret', function () { return view('simulateur_pret'); });
Route::get('/simulateur_epargne', function () { return view('simulateur_epargne'); });
