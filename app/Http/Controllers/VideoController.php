<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'long_description' => 'required',
            'youtube_video_link' => 'required',
            'active' => 'required',
            'seo_title' => 'nullable',
            'seo_meta' => 'nullable',
            'seo_image' => 'nullable',
        ]);

        $video = new Video;
        $video->title = $request->input('title');
        $video->short_description = $request->input('short_description');
        $video->long_description = $request->input('long_description');
        $video->youtube_video_link = $request->input('youtube_video_link');
        $video->active = $request->input('active');
        $video->seo_title = $request->input('seo_title');
        $video->seo_meta = $request->input('seo_meta');
        $video->seo_image = $request->input('seo_image');
        $video->save();

        return redirect()->route('videos.index')->with('success', 'Video created successfully.');
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.show', compact('video'));
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'long_description' => 'required',
            'youtube_video_link' => 'required',
            'active' => 'required',
            'seo_title' => 'nullable',
            'seo_meta' => 'nullable',
            'seo_image' => 'nullable',
        ]);

        $video = Video::findOrFail($id);
        $video->title = $request->input('title');
        $video->short_description = $request->input('short_description');
        $video->long_description = $request->input('long_description');
        $video->youtube_video_link = $request->input('youtube_video_link');
        $video->active = $request->input('active');
        $video->seo_title = $request->input('seo_title');
        $video->seo_meta = $request->input('seo_meta');
        $video->seo_image = $request->input('seo_image');
        $video->save();

        return redirect()->route('videos.index')->with('success', 'Video updated successfully.');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return redirect()->route('videos.index')->with('success', 'Video deleted successfully.');
    }
}
