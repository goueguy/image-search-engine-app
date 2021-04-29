<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PicturesController;

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

Route::get('/', [PicturesController::class,"index"]);
Route::get('/pictures/create', [PicturesController::class,"create"])->name("pictures.create");
Route::post('/pictures/store', [PicturesController::class,"store"])->name("pictures.store");
Route::post('/pictures/find', [PicturesController::class,"findPictures"])->name("pictures.find");
