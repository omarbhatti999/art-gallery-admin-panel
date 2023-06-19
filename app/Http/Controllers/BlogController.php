<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            // 'short_description' => 'required',
            'long_description' => 'required',
            'type' => 'required',
            'active' => 'required',
            'seo_title' => 'nullable',
            'seo_meta' => 'nullable',
            'seo_image' => 'nullable',
            'thumbnail_image' => 'nullable',
            'banner_image' => 'nullable',
        ]);

        // Upload images and store their paths in the database
        $thumbnailImage = $request->file('thumbnail_image')->store('public/blogs');
        $bannerImage = $request->file('banner_image')->store('public/blogs');

        $blog = new Blog;
        $blog->title = $request->input('title');
        $blog->short_description = $request->input('short_description');
        $blog->long_description = $request->input('long_description');
        $blog->type = $request->input('type');
        $blog->active = $request->input('active');
        $blog->seo_title = $request->input('seo_title');
        $blog->seo_meta = $request->input('seo_meta');
        $blog->seo_image = $request->input('seo_image');
        $blog->video_link = $request->input('video_link');
        $blog->thumbnail_image = $thumbnailImage;
        $blog->banner_image = $bannerImage;
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            // 'short_description' => 'required',
            'long_description' => 'required',
            'type' => 'required',
            'active' => 'required',
            'seo_title' => 'nullable',
            'seo_meta' => 'nullable',
            'seo_image' => 'nullable',
            'thumbnail_image' => 'nullable',
            'banner_image' => 'nullable',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $request->input('title');
        $blog->short_description = $request->input('short_description');
        $blog->long_description = $request->input('long_description');
        $blog->type = $request->input('type');
        $blog->video_link = $request->input('video_link');
        $blog->active = $request->input('active');
        $blog->seo_title = $request->input('seo_title');
        $blog->seo_meta = $request->input('seo_meta');
        $blog->seo_image = $request->input('seo_image');

        if ($request->hasFile('thumbnail_image')) {
            // Delete old image file
            Storage::delete($blog->thumbnail_image);

            // Upload new image and update path in the database
            $thumbnailImage = $request->file('thumbnail_image')->store('public/blogs');
            $blog->thumbnail_image = $thumbnailImage;
        }

        if ($request->hasFile('banner_image')) {
            // Delete old image file
            Storage::delete($blog->banner_image);

            // Upload new image and update path in the database
            $bannerImage = $request->file('banner_image')->store('public/blogs');
            $blog->banner_image = $bannerImage;
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete associated images
        Storage::delete([$blog->thumbnail_image, $blog->banner_image]);

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
