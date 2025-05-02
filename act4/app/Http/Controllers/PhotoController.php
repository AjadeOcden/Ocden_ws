<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function create(Request $request){
        $allImages = \File::files(public_path('images'));

        // Pagination logic
        $perPage = 12;
        $page = $request->get('page', 1);
        $offset = ($page - 1) * $perPage;
    
        $images = array_slice($allImages, $offset, $perPage);
        $total = count($allImages);
    
        return view('uploadImage', [
            'images' => $images,
            'total' => $total,
            'page' => $page,
            'perPage' => $perPage
        ]);
    }

    public function storeSingle(Request $request){
        $request->validate([
            "image"=> 'required|image|mimes:jpg,jped,png,gif|max:2048'
        ]);

        $image = $request->file("image");
        $name = time()." ".$image->getClientOriginalName();
        $image->move(public_path("images"),$name);

        Photo::create([
            "image" => $name
        ]);
        return back()->with('success', 'images uploaded successfully!');
   
    }
    public function storeMultiple(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        foreach ($request->file('images') as $image) {
            $name = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'), $name);

            Photo::create(['image' => $name]);
        }

        return back()->with('success', 'Multiple images uploaded successfully!');
    }

    public function delete(Request $request)
{
    $request->validate([
        'filename' => 'required'
    ]);

    $filename = $request->input('filename');
    $path = public_path('images/' . $filename);

    if (\File::exists($path)) {
        \File::delete($path);

        Photo::where('image', $filename)->delete();

        return back()->with('success', 'Image deleted successfully.');
    }

    return back()->with('error', 'Image not found.');
}


}

    

