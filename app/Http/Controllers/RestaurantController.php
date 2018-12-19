<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Restaurant;
use Auth;

class RestaurantController extends Controller
{
    public function index()
    {    
    	$restaurants = restaurant::all();
        return view('restaurants.index')->with([
            'restaurants' => $restaurants,
        ]);

    }
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);
        $cuisines = App\Cuisine::getForCheckboxes();
        $cuisinesForThisRestaurant = $restaurant->cuisines()->pluck('cuisines.id')->toArray();
        if (!$restaurant) {
            return redirect('/restaurants')->with([
                'alert' => 'Restaurant not found.'
            ]);
        }
        return view('restaurants.edit')->with([
            'restaurant' => $restaurant,
            'cuisines' => $cuisines,
            'cuisinesForThisRestaurant' => $cuisinesForThisRestaurant
        ]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|url',
            'cuisines' => 'required'
        ]);
        $restaurant = Restaurant::find($id);
        $restaurant->cuisines()->sync($request->cuisines);
        $restaurant->name = $request->name;
        $restaurant->image = $request->image;
        $restaurant->description = $request->description;
        $restaurant->save();
        $message = 'Your changes were saved.';
        return redirect('/restaurants')->with([
            'alert' => $message
        ]);
    }
}
