<?php header('Access-Control-Allow-Origin: *');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;

Route::post('/register', [AuthController::class,'createUser']);
Route::post('/login', [AuthController::class,'loginUser']);

Route::get('/postman/csrf', function (Request $request) {
    return csrf_token();
});

Route::middleware('auth:sanctum')->group(function () { 
    Route::get('/categorys', CategoryController::class)->name('categorys');

    Route::get('/contacts', [ContactController::class,'index']);

    Route::post('/contacts/comments',[CommentController::class,'submit']);   
    Route::get('/contacts/comments',[CommentController::class,'index'])->name('posts-comments');

    Route::get('/contacts/{id}',[ContactController::class,'showOneMessage'])->name('contact-data-one');

    Route::get('/contacts/{id}/update',[ContactController::class,'updateMessageSubmit']);
    Route::put('/contacts/{id}/update',[ContactController::class,'updateMessageSubmit']);

    Route::get('/contacts/{id}/delete',[ContactController::class,'deleteMessage'])->name('contact-delete');
    Route::delete('/contacts/{id}/delete',[ContactController::class,'deleteMessage'])->name('contact-delete');

    Route::get('/contact',[ContactController::class,'allData']);
    Route::post('/contact',[ContactController::class,'submit']);

    Route::get('/query', [AuthController::class,'queryy']);
    Route::get('/auth', [AuthController::class,'auth']);
});
