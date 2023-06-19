<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    /**
     * Display a listing of the artists.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all();
        return view('admin.artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new artist.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artists.add');
    }

    /**
     * Store a newly created artist in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'active' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'seo_image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        // Handle image uploads
        $imagePath = $request->file('image')->store('artists', 'public');
        $seoImagePath = $request->file('seo_image') ? $request->file('seo_image')->store('artists', 'public') : null;

        // Create a new artist
        $artist = new Artist;
        $artist->name = $validatedData['name'];
        $artist->slug = $validatedData['slug'];
        $artist->short_description = $validatedData['short_description'];
        $artist->long_description = $validatedData['long_description'];
        $artist->instagram = $request->input('instagram');
        $artist->facebook = $request->input('facebook');
        $artist->youtube = $request->input('youtube');
        $artist->twitter = $request->input('twitter');
        $artist->tiktok = $request->input('tiktok');
        $artist->active = $validatedData['active'];
        $artist->sort_number = $request->input('sort_number');
        $artist->image = $imagePath;
        $artist->seo_title = $request->input('seo_title');
        $artist->seo_meta = $request->input('seo_meta');
        $artist->seo_image = $seoImagePath;
        $artist->seo_keywords = $request->input('seo_keywords');
        $artist->save();

        // Redirect to the index page or do something else
        return redirect()->route('artists.index')->with('success', 'Artist added successfully.');
    }

    /**
     * Show the form for editing the specified artist.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist = Artist::findOrFail($id);
        return view('admin.artists.edit', compact('artist'));
    }

    /**
     * Update the specified artist in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'active' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'seo_image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        // Find the artist
        $artist = Artist::findOrFail($id);

        // Update the artist
        $artist->name = $validatedData['name'];
        $artist->slug = $validatedData['slug'];
        $artist->short_description = $validatedData['short_description'];
        $artist->long_description = $validatedData['long_description'];
        $artist->instagram = $request->input('instagram');
        $artist->facebook = $request->input('facebook');
        $artist->youtube = $request->input('youtube');
        $artist->twitter = $request->input('twitter');
        $artist->tiktok = $request->input('tiktok');
        $artist->active = $validatedData['active'];
        $artist->sort_number = $request->input('sort_number');

        if ($request->hasFile('image')) {
            // Handle new image upload
            $imagePath = $request->file('image')->store('artists', 'public');
            $artist->image = $imagePath;
        }

        $artist->seo_title = $request->input('seo_title');
        $artist->seo_meta = $request->input('seo_meta');

        if ($request->hasFile('seo_image')) {
            // Handle new SEO image upload
            $seoImagePath = $request->file('seo_image')->store('artists', 'public');
            $artist->seo_image = $seoImagePath;
        }

        $artist->seo_keywords = $request->input('seo_keywords');
        $artist->save();

        // Redirect to the index page or do something else
        return redirect()->route('artists.index')->with('success', 'Artist updated successfully.');
    }

    /**
     * Remove the specified artist from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();

        // Redirect to the index page or do something else
        return redirect()->route('artists.index')->with('success', 'Artist deleted successfully.');
    }
}
