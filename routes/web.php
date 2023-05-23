<?php

use App\Http\Controllers\PeopleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post("/miskiewicz/50265/people", [PeopleController::class, 'create']);
Route::get("/miskiewicz/50265/people/{id}", [PeopleController::class, 'read']);
Route::put("/miskiewicz/50265/people/{id}", [PeopleController::class, 'update']);
Route::delete("/miskiewicz/50265/people/{id}", [PeopleController::class, 'delete']);
Route::get("/miskiewicz/50265/people", [PeopleController::class, 'index']);