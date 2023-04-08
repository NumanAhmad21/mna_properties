<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ImageController extends Controller
{
    //
    public function index()
    {
        return view('projects.upload_images');
    }
    public function store(Request $request)
    {   
        $request->validate([
            'images' => 'required|array|min:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $project_id = $request->input('project_id');
        
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $file_name = $image->getClientOriginalName();
                $filename = $image->getClientOriginalName();
                $image->move(public_path('images'), $filename);
                $img = new Image;
                $img->file_name = $file_name;
                $img->project_id = $project_id;
                $img->save();
            }
        }
        return redirect()->route('projects.index')->with('success', 'Images Added successfully.');
        
    }
    public function showImages($id)
    {
        $images = Image::where('project_id', $id)->get();
        return view('projects.showImages', compact('images'));
    }
    public function destroyImage($imageID)
    {
        $image = Image::find($imageID);    
        $imagePath = public_path('images/' . $image->file_name);
        if (File::exists($imagePath)) {
            unlink($imagePath);
        }
        $image->delete();
        return redirect()->route('projects.index')->with('success', 'Images Deleted successfully.');
        
    }

}
