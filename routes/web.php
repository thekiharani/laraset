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

Route::get('/', 'HomeController@welcome')->name('welcome');

Route::view('contact', 'contact')->name('contact');

Auth::routes();

Route::layout('layouts.app')->section('content')->prefix('blog')->name('blog.')->middleware('auth')->group(function () {
	// Categories
	Route::livewire('categories', 'categories.list-all')->name('category.index');
	Route::livewire('category/create', 'categories.create')->name('category.create');
	Route::livewire('category/{category}/edit', 'categories.edit')->name('category.edit');
    Route::livewire('category/{slug}_{category}', 'categories.show')->name('category.show');

    // Posts
    Route::livewire('posts', 'posts.list-all')->name('post.index');
	Route::livewire('post/create', 'posts.create')->name('post.create');
	Route::livewire('post/{post}/edit', 'posts.edit')->name('post.edit');
    Route::livewire('post/{slug}_{post}', 'posts.show')->name('post.show');
});
