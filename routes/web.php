<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     // return view('welcome');
//     return view('main.main');
// });

//Article
Route::resource('/article', ArticleController::class);
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show')->middleware('path');

//Comment
Route::group(['prefix' => '/comment', 'middleware' => 'auth:sanctum'], function(){
    Route::post('/store', [CommentController::class, 'store']);
    Route::get('/edit/{id}', [CommentController::class, 'edit']);
    Route::post('/update/{id}', [CommentController::class, 'update']);
    Route::get('/delete/{id}', [CommentController::class, 'delete']);
    Route::get('', [CommentController::class, 'index'])->name('comments');
    Route::get('accept/{id}', [CommentController::class, 'accept']);
    Route::get('reject/{id}', [CommentController::class, 'reject']);
});

///Auth

Route::get('/create', [AuthController::class, 'create']);
Route::post('/registr', [AuthController::class, 'registr']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'customLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/', [MainController::class, 'index']);
Route::get('galery/{img}', [MainController::class, 'show']);

Route::get('/contacts', function(){
    $contact = [
        'name' => 'Mospolytech',
        'address' => 'B. Semenovskaya 38',
        'phone' => '+7(495)-999-99-99'
    ];
    return view('main.contact', ['data' => $contact]);
});