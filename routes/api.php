<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', 'App\Http\Controllers\ContactController@index')->name('posts');

Route::post('/posts/comments','App\Http\Controllers\CommentController@submit')->name('posts-comments');
Route::get('/posts/comments','App\Http\Controllers\CommentController@index')->name('posts-comments');

Route::get('/contact/all/{id}',
'App\Http\Controllers\ContactController@showOneMessage'
)->name('contact-data-one');

Route::get('/contact/all/{id}/update',
'App\Http\Controllers\ContactController@updateMessageSubmit'
)->name('contact-update');

Route::put('/contact/all/{id}/update',
'App\Http\Controllers\ContactController@updateMessageSubmit'
)->name('contact-update-submit');

Route::get('/contact/all/{id}/delete',
'App\Http\Controllers\ContactController@deleteMessage'
)->name('contact-delete');

Route::delete('/contact/all/{id}/delete',
'App\Http\Controllers\ContactController@deleteMessage'
)->name('contact-delete');

Route::get('/postman/csrf', function (Request $request) {
	return csrf_token();
});

Route::get('/contact/all','App\Http\Controllers\ContactController@allData')->name('contact-data');
Route::post('/contact/submit','App\Http\Controllers\ContactController@submit')->name('contact-form');


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});
