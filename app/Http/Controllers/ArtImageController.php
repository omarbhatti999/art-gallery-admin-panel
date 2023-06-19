<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\ArtImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtImageController extends Controller
{
    public function create(Request $request, Art $art)
    {
        // Validate the request
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        // Store the image files
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $originalName = $image->getClientOriginalName();
                $imageName = time() . '_' . str_replace(' ', '-', $originalName);
                $imagePath = $image->storeAs('public/art_images', $imageName);

                $artImage = new ArtImage();
                $artImage->art_id = $art->id;
                $artImage->image_path = $imagePath;
                $artImage->save();
            }
        }

        return redirect()->back()->with('success', 'Art images added successfully');
    }  

    public function update(Request $request, ArtImage $artImage)
    {
        // Validate the request
        $request->validate([
            'featured_image' => 'required|boolean',
            'image_type' => 'required|in:vertical,horizontal',
        ]);

        // Update the art image
        // dd($artImage->featured_image);
        
        $artImage->featured_image = $request->input('featured_image');
        $artImage->image_type = $request->input('image_type');
        $artImage->save();

        return redirect()->back()->with('success', 'Art image updated successfully');
    }




    public function delete(ArtImage $artImage)
    {
        // Delete the image file from storage
        if (Storage::exists($artImage->image_path)) {
            Storage::delete($artImage->image_path);
        }

        $artImage->delete();

        return redirect()->back()->with('success', 'Art image deleted successfully');
    }
}