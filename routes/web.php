<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

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

///Auth

Route::get('/create', [AuthController::class, 'create']);
Route::post('/registr', [AuthController::class, 'registr']);

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