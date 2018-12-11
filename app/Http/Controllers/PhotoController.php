<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Photo;
use Auth;

class PhotoController extends Controller
{

    public function index()
    {    
    	$user = Auth::user();
    	$photos = Photo::all();
        $latestphotos = $photos->sortByDesc('created_at')->take(4);
    	if($user){
	    	$myphotos = $user->photos()->orderBy('title')->get(); 
	    }else {
	    	$myphotos = null;
	    }
        return view('welcome')->with([
            'photos' => $photos,
            'myphotos' => $myphotos,
            'latestphotos' => $latestphotos
        ]);

    }

    public function show(Request $request, $id)
    {
        $photo = Photo::find($id);
        return view('photos.show')->with([
            'photo' => $photo
        ]);
    }

	public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'restaurant_id' => 'required',
            'image' => 'required|url',
            'diets' => 'required'
        ]);
        $photo = new Photo();
        $photo->title = $request->title;
        $photo->restaurant_id = $request->restaurant_id;
        $photo->image = $request->image;
        $photo->description = $request->description;
        $photo->user_id = Auth::user()->id;
        $photo->save();
        # Note: Have to sync restaurants *after* the photo has been saved so there's a photo_id to store in the pivot table
        $photo->diets()->sync($request->diets);
        return redirect('/photos')->with([
            'alert' => 'Your photo was added.'
        ]);
	}
    public function edit($id)
    {
        $photo = Photo::find($id);
        $restaurants = App\Restaurant::getForDropdown();
        $diets = App\Diet::getForCheckboxes();
        $dietsForThisPhoto = $photo->diets()->pluck('diets.id')->toArray();
        if (!$photo) {
            return redirect('/photos')->with([
                'alert' => 'Photo not found.'
            ]);
        }
        return view('photos.edit')->with([
            'photo' => $photo,
            'restaurants' => $restaurants,
            'diets' => $diets,
            'dietsForThisPhoto' => $dietsForThisPhoto
        ]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'restaurant_id' => 'required',
            'image' => 'required|url',
            'diets' => 'required'
        ]);
        $photo = Photo::find($id);
        $photo->diets()->sync($request->diets);
        $photo->title = $request->title;
        $photo->restaurant_id = $request->restaurant_id;
        $photo->image = $request->image;
        $photo->description = $request->description;
        $photo->save();
        return redirect('/photos/' . $id . '/edit')->with([
            'alert' => 'Your changes were saved.'
        ]);
    }
    public function create(Request $request)
    {
        $restaurants = App\Restaurant::getForDropdown();
        $diets = App\Diet::getForCheckboxes();
        return view('photos.create')->with([
            'restaurants' => $restaurants,
            'diets' => $diets
    	]);
    }
    public function delete($id)
    {
        $photo = Photo::find($id);
        if (!$photo) {
            return redirect('/photos')->with('alert', 'Photo not found');
        }
        return view('photos.delete')->with([
            'photo' => $photo,
        ]);
    }
    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->diets()->detach();
        $photo->delete();
        return redirect('/photos')->with([
            'alert' => '“' . $photo->title . '” was removed.'
        ]);
    }
}