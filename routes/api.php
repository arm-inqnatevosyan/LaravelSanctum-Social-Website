<?php header('Access-Control-Allow-Origin: *');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Contacts\Comments\PostController;
use App\Http\Controllers\Contacts\Comments\GetController;
use App\Http\Controllers\Contacts\Comments\QueryController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\Contacts\Get_Controller;
use App\Http\Controllers\Contacts\Post_Controller;
use App\Http\Controllers\Categories\AddController;
use App\Http\Controllers\Categories\ViewController;

use App\Http\Controllers\Contacts\Update_Controller;
use App\Http\Controllers\Contacts\Delete_Controller;
use App\Http\Controllers\Categories\ViewAllController;

Route::post('/register', [AuthController::class,'createUser']);
Route::post('/login', [AuthController::class,'loginUser']);

Route::get('/postman/csrf', function (Request $request) {
    return csrf_token();
});

Route::middleware('auth:sanctum')->group(function () { 

    Route::get('/categories', ViewAllController::class);

    Route::get('/contacts', Get_Controller::class);
    Route::post('/contacts/comments',PostController::class);   
    Route::get('/contacts/comments',GetController::class);

    Route::get('/contacts/{id}/update',Update_Controller::class);
    Route::put('/contacts/{id}/update',Update_Controller::class);

    Route::get('/contacts/{id}/delete',Delete_Controller::class);
    Route::delete('/contacts/{id}/delete',Delete_Controller::class);

    Route::get('/contact',UsersController::class);
    Route::post('/contact',Post_Controller::class);

    Route::get('/query', QueryController::class);

    Route::post('/category', AddController::class);
    Route::get('/category', ViewController::class);
    
});
