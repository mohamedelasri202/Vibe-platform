<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // show all listings 
    public function index()
    {
        return view('listings', [
            'listings' => Listing::all()
        ]);
    }
    // show a single listing 
    public function show(listing $Listing)
    {
        return view('listings', [
            'listings' => Listing::all()
        ]);
    }
}
