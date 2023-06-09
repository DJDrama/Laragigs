<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/hello', function () {
    return response('<h1>Hello World!</h1>')
        ->header('Content-Type', 'text/plain')
        ->header('foo', 'bar');
});

Route::get('/posts/{id}', function ($id) {
    // dd($id); // Dump Die
    // ddd($id); // Dump Die Debug
    return response('Post ' . $id);
})->where('id', '[0-9]+');

// ex) http://laragigs.test/search?name=Brad&city=Boston
Route::get('/search', function (Request $request) {
    // dd($request->name . ' ' . $request->city);
    return $request->name . ' ' . $request->city;
});


/** Common Resource Routes */
// index - Show all items
// show - Show single item
// create - Show form to create new item
// store - Store new item
// edit - Show form to edit item
// update - Update item
// destroy - Delete item


// NEW
// get all Listings
Route::get('/', [ListingController::class, 'index']);

// Show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth'); // if not signed in, will go to login page

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth'); // if not signed in, will go to login page;

// Show Edit Form
Route::get("/listings/{listing}/edit", [ListingController::class, 'edit'])->middleware('auth'); // if not signed in, will go to login page;

// Edit Submit to Update
Route::put("listings/{listing}", [ListingController::class, 'update'])->middleware('auth'); // if not signed in, will go to login page;

// Delete
Route::delete("listings/{listing}", [ListingController::class, 'destroy'])->middleware('auth'); // if not signed in, will go to login page;

// Manage Listings
Route::get("/listings/manage", [ListingController::class, 'manage'])->middleware('auth');

// get single listings
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest'); // only guest can register

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth'); // if not signed in, will go to login page;

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest'); // Authenticate.php same name 'login'

// Log in User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


