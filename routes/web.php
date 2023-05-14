<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserContoller;
use App\Http\Controllers\ListingController;

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

//All Listings
Route::get('/', [ListingController::class, 'index']);


// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');


//Store listing  Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//  Update Listing

Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//  Delete Listing

Route::delete('/listings/{listing}', [ListingController::class, 'delete'])->middleware('auth');

Route::get('/listings/manage',   [ListingController::class, 'manage'])->middleware('auth');


//Single listing 
Route::get('/listings/{listing}', [ListingController::class, 'show']);


// Register
Route::get('/register', [UserContoller::class, 'create'])->middleware('guest');


//Crete new user
Route::post('/users', [UserContoller::class,'store']);


//Log out user 
Route::post('/logout', [UserContoller::class, 'logout'])->middleware('auth');

//show login form

Route::get('/login', [UserContoller::class, 'login'])->name('login')->middleware('guest');


Route::post('/users/authenticate', [UserContoller::class, 'authenticate']);


