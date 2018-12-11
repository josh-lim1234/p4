<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Photo;

class PhotoController extends Controller
{

    public function index()
    {    
    	$photos = Photo::all();
        return view('welcome')->with([
            'photos' => $photos
        ]);
    }

    public function show(Request $request, $id)
    {
        $photo = Photo::find($id);
        return view('photos.show')->with([
            'photo' => $photo
        ]);
    }

	public function search(Request $request)
	{
	    return view('photos.search')->with([
	        'searchTerm' => $request->session()->get('searchTerm', ''),
	        'caseSensitive' => $request->session()->get('caseSensitive', false),
	        'searchResults' => $request->session()->get('searchResults', []),
	    ]);
	}
	public function searchProcess(Request $request) 
	{
	    $searchResults = [];
	    $searchTerm = $request->input('searchTerm', null);
	    if ($searchTerm) {
	        $photosRawData = file_get_contents(database_path('/photos.json'));
	        $photos = json_decode($photosRawData, true);
	        foreach ($photos as $title => $photo) {
	            if ($request->has('caseSensitive')) {
	                $match = $title == $searchTerm;
	            } else {
	                $match = strtolower($title) == strtolower($searchTerm);
	            }
	            if ($match) {
	                $searchResults[$title] = $photo;
	            }
	        }
	    }
	    return redirect('/photos/search')->with([
	        'searchTerm' => $searchTerm,
	        'caseSensitive' => $request->has('caseSensitive'),
	        'searchResults' => $searchResults
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
        $photo->user_id = 1;
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