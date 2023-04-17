<?php

use App\Http\Controllers\ListingController;
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
Route::get('/listings/create', [ListingController::class, 'create']);

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);

// Show Edit Form
Route::get("/listings/{listing}/edit", [ListingController::class, 'edit']);

// Edit Submit to Update
Route::put("listings/{listing}", [ListingController::class, 'update']);

// get single listings
Route::get('/listings/{listing}', [ListingController::class, 'show']);



