<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('admin.categories.add', compact('tags'));
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'tags' => 'nullable|array',
            'description' => 'nullable',
            'seo_title' => 'nullable',
            'seo_meta' => 'nullable',
            'seo_image' => 'nullable|image', // Validation rule for image file
            'icon_image' => 'nullable|image', // Validation rule for image file
            'sort_number' => 'nullable|integer',
            'status' => 'nullable|in:active,inactive',
        ]);

        // Handle image uploads
        if ($request->hasFile('seo_image')) {
            $seoImage = $request->file('seo_image');
            $seoImagePath = $seoImage->store('category/seo_images', 'public');
            $validatedData['seo_image'] = $seoImagePath;
        }

        if ($request->hasFile('icon_image')) {
            $iconImage = $request->file('icon_image');
            $iconImagePath = $iconImage->store('category/icon_images', 'public');
            $validatedData['icon_image'] = $iconImagePath;
        }

        $category = Category::create($validatedData);

        if ($request->has('tags')) {
            $category->tags()->sync($request->tags);
        }

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $tags = Tag::all();
        return view('admin.categories.edit', compact('category', 'tags'));
    }

    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'tags' => 'nullable|array',
            'description' => 'nullable',
            'seo_title' => 'nullable',
            'seo_meta' => 'nullable',
            'seo_image' => 'nullable|image', // Validation rule for image file
            'icon_image' => 'nullable|image', // Validation rule for image file
            'sort_number' => 'nullable|integer',
            'status' => 'nullable|in:active,inactive',
        ]);

        // Handle image uploads
        if ($request->hasFile('seo_image')) {
            $seoImage = $request->file('seo_image');
            $seoImagePath = $seoImage->store('category/seo_images', 'public');
            $validatedData['seo_image'] = $seoImagePath;
        }

        if ($request->hasFile('icon_image')) {
            $iconImage = $request->file('icon_image');
            $iconImagePath = $iconImage->store('category/icon_images', 'public');
            $validatedData['icon_image'] = $iconImagePath;
        }

        $category->update($validatedData);

        if ($request->has('tags')) {
            $category->tags()->sync($request->tags);
        }

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
