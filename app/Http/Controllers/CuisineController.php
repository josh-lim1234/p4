<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class CuisineController extends Controller
{
    public function index()
    {    
    	$cuisines = App\Cuisine::all();
        return view('cuisines.index')->with([
            'cuisines' => $cuisines,
        ]);

    }
}
