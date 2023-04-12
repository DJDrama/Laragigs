<?php

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


// NEW
// get all Listings
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => Listing::all() // :: static method
    ]); // listings.blade.php
});

// get single listings
Route::get('/listings/{id}', function($id){
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});
