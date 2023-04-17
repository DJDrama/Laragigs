<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        /*dd(request());
        dd(request('tag'));*/
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4) // can also use simplePaginate(4) (only prev, next)
        ]);
    }

    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show Create Form
    public function create(){
        return view('listings.create');
    }

    // Store Listing
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); // store('logos') : logos folder
        } // php artisan storage:link -> we can access by http://laragigs.test/storage/logos/Z5F4LfTILQKHBHbfoQY8Fp2Y74ZW8u4Rf3fE3oSF.png
        Listing::create($formFields);
        // Session::flash('message', 'Listing Created!');
        return redirect('/')->with('message', 'Listing Created!');
    }
}
