<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Comments\PostCommentController;
use App\Http\Controllers\Comments\GetCommentController;
use App\Http\Controllers\Comments\QueryCommentController;
use App\Http\Controllers\Users\GetUsersController;
use App\Http\Controllers\Contacts\GetContactController;
use App\Http\Controllers\Contacts\PostContactController;
use App\Http\Controllers\Categories\PostCategoryController;
use App\Http\Controllers\Categories\GetCategoryController;
use App\Http\Controllers\Contacts\UpdateContactController;
use App\Http\Controllers\Contacts\DeleteContactController;
use App\Http\Controllers\Contacts\AddLikeContactController;
use App\Http\Controllers\Contacts\GetLikeContactController;
use App\Http\Controllers\Categories\GetCategoryContactsController;

Route::post('/register', [AuthController::class,'createUser']);
Route::post('/login', [AuthController::class,'loginUser']);
Route::post('/logout', [AuthController::class,'logout']);

Route::get('/postman/csrf', function (Request $request) {
    return csrf_token();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () { 

    Route::get('/categories', GetCategoryContactsController::class);

    Route::get('/contacts', GetContactController::class);
    Route::post('/contacts/comments',PostCommentController::class);   
    Route::get('/contacts/comments',GetCommentController::class);

    Route::get('/contacts/{id}/update',UpdateContactController::class);
    Route::put('/contacts/{id}/update',UpdateContactController::class);

    Route::get('/contacts/{id}/delete',DeleteContactController::class);
    Route::delete('/contacts/{id}/delete',DeleteContactController::class);

    Route::get('/contact',GetUsersController::class);
    Route::post('/contact',PostContactController::class);

    Route::get('/query', QueryCommentController::class);

    Route::post('/category', PostCategoryController::class);
    Route::get('/category', GetCategoryController::class);
    
    Route::get('/likes', GetLikeContactController::class);
    Route::post('/likes/{id}', AddLikeContactController::class);

    Route::get('/author',  function () {
        return auth() -> id();
   });
});
