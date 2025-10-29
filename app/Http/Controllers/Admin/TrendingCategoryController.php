<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrendingCategory;
use Illuminate\Support\Facades\Storage;

class TrendingCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = TrendingCategory::all();
        return view('admin.trending_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.trending_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required|string|max:255',
            'image'  => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'status' => 'required|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('trending_categories', 'public');
        }

        TrendingCategory::create([
            'title'  => $request->title,
            'image'  => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.trending_categories.index')
                         ->with('success', 'Trending Category added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrendingCategory $trending_category)
    {
        return view('admin.trending_categories.edit', compact('trending_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrendingCategory $trending_category)
    {
        $request->validate([
            'title'  => 'required|string|max:255',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'status' => 'required|boolean',
        ]);

        // Update image if new uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            if ($trending_category->image && Storage::disk('public')->exists($trending_category->image)) {
                Storage::disk('public')->delete($trending_category->image);
            }

            $imagePath = $request->file('image')->store('trending_categories', 'public');
            $trending_category->image = $imagePath;
        }

        $trending_category->title  = $request->title;
        $trending_category->status = $request->status;
        $trending_category->save();

        return redirect()->route('admin.trending_categories.index')
                         ->with('success', 'Trending Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrendingCategory $trending_category)
    {
        // Delete image file
        if ($trending_category->image && Storage::disk('public')->exists($trending_category->image)) {
            Storage::disk('public')->delete($trending_category->image);
        }

        $trending_category->delete();

        return redirect()->route('admin.trending_categories.index')
                         ->with('success', 'Trending Category deleted successfully!');
    }
}
