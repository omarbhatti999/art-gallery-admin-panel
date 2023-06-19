<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Art;
use App\Models\Category;
use App\Models\Artist;
use Illuminate\Support\Facades\Storage;

class ArtController extends Controller
{
    public function index()
    {
        $arts = Art::all();
        return view('admin.arts.index', compact('arts'));
    }

    public function create()
    {
        $categories = Category::all();
        $artists = Artist::all();
        return view('admin.arts.add', compact('categories', 'artists'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:arts',
            // 'banner_image' => 'image|mimes:jpeg,png,jpg,gif',
            // 'thumb_image' => 'image|mimes:jpeg,png,jpg,gif',
            // 'seo_image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $art = new Art();
        $art->title = $request->title;
        $art->slug = $request->slug;
        $art->slider_caption = $request->slider_caption;
        $art->short_description = $request->short_description;
        $art->long_description = $request->long_description;
        $art->year = $request->year;
        $art->materials = $request->materials;
        $art->size = $request->size;
        $art->edition = $request->edition;
        $art->category_id = $request->category_id;
        $art->series = $request->series;
        $art->artist_id = $request->artist_id;
        $art->location = $request->location;
        $art->availability = $request->availability;
        $art->featured = $request->featured;
        $art->sort_number = $request->sort_number;
        $art->active = $request->active;
        $art->hidden = $request->hidden;
        $art->seo_keywords = $request->seo_keywords;
        $art->seo_meta = $request->seo_meta;
        $art->seo_title = $request->seo_title;

        // Upload and store the banner image
        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image');
            $bannerImageName = time() . '_' . $bannerImage->getClientOriginalName();
            Storage::putFileAs('public/art', $bannerImage, $bannerImageName);
            $art->banner_image = $bannerImageName;
        }

        // Upload and store the thumbnail image
        if ($request->hasFile('thumb_image')) {
            $thumbImage = $request->file('thumb_image');
            $thumbImageName = time() . '_' . $thumbImage->getClientOriginalName();
            Storage::putFileAs('public/art', $thumbImage, $thumbImageName);
            $art->thumb_image = $thumbImageName;
        }

        // Upload and store the SEO image
        if ($request->hasFile('seo_image')) {
            $seoImage = $request->file('seo_image');
            $seoImageName = time() . '_' . $seoImage->getClientOriginalName();
            Storage::putFileAs('public/art', $seoImage, $seoImageName);
            $art->seo_image = $seoImageName;
        }

        $art->save();

        return redirect()->route('arts.index')->with('success', 'Art created successfully.');
    }

    public function edit(Art $art)
    {
        $art->load('artImages'); // Eager load the artImages relationship
        $categories = Category::all();
        $artists = Artist::all();
        return view('admin.arts.edit', compact('art', 'categories', 'artists'));
    }

    public function update(Request $request, Art $art)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:arts,slug,' . $art->id,
            // 'banner_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'thumb_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'seo_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $art->title = $request->title;
        $art->slug = $request->slug;
        $art->slider_caption = $request->slider_caption;
        $art->short_description = $request->short_description;
        $art->long_description = $request->long_description;
        $art->year = $request->year;
        $art->materials = $request->materials;
        $art->size = $request->size;
        $art->edition = $request->edition;
        $art->category_id = $request->category_id;
        $art->series = $request->series;
        $art->artist_id = $request->artist_id;
        $art->location = $request->location;
        $art->availability = $request->availability;
        $art->featured = $request->featured;
        $art->sort_number = $request->sort_number;
        $art->active = $request->active;
        $art->hidden = $request->hidden;
        $art->seo_keywords = $request->seo_keywords;
        $art->seo_meta = $request->seo_meta;
        $art->seo_title = $request->seo_title;

        // Upload and store the banner image
        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image');
            $bannerImageName = time() . '_' . $bannerImage->getClientOriginalName();
            Storage::putFileAs('public/art', $bannerImage, $bannerImageName);
            $art->banner_image = $bannerImageName;
        }

        // Upload and store the thumbnail image
        if ($request->hasFile('thumb_image')) {
            $thumbImage = $request->file('thumb_image');
            $thumbImageName = time() . '_' . $thumbImage->getClientOriginalName();
            Storage::putFileAs('public/art', $thumbImage, $thumbImageName);
            $art->thumb_image = $thumbImageName;
        }

        // Upload and store the SEO image
        if ($request->hasFile('seo_image')) {
            $seoImage = $request->file('seo_image');
            $seoImageName = time() . '_' . $seoImage->getClientOriginalName();
            Storage::putFileAs('public/art', $seoImage, $seoImageName);
            $art->seo_image = $seoImageName;
        }

        $art->save();

        return redirect()->route('arts.index')->with('success', 'Art updated successfully.');
    }

    public function destroy(Art $art)
    {
        $art->delete();

        return redirect()->route('arts.index')->with('success', 'Art deleted successfully.');
    }
}
