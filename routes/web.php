<?php

use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/feedback', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Route::get('/posts', 'App\Http\Controllers\ContactController@index')->name('posts');
// Route::get('/posts', 'App\Http\Controllers\Web\CommentController@allDataa')->name('posts');


Route::get('/contact/all/{id}',
'App\Http\Controllers\Web\ContactController@showOneMessage'
)->name('contact-data-one');

Route::get('/contact/all/{id}/update',
'App\Http\Controllers\ContactController@updateMessage'
)->name('contact-update');

Route::post('/contact/all/{id}/update',
'App\Http\Controllers\ContactController@updateMessageSubmit'
)->name('contact-update-submit');

Route::get('/contact/all/{id}/delete',
'App\Http\Controllers\ContactController@deleteMessage'
)->name('contact-delete');

Route::get('/postman/csrf', function (Request $request) {
	return csrf_token();
});

Route::get('/contact/all','App\Http\Controllers\Web\ContactController@allData')->name('contact-data');
Route::post('/contact/submit','App\Http\Controllers\Web\ContactController@submit')->name('contact-form');