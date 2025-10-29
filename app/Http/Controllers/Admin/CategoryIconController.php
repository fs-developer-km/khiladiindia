<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryIcon;
use Illuminate\Http\Request;

class CategoryIconController extends Controller
{
    // Show list
    public function index()
    {
        $icons = CategoryIcon::orderBy('id', 'desc')->get();
        return view('admin.category_icons.index', compact('icons'));
    }

    // Create form
    public function create()
    {
        return view('admin.category_icons.create');
    }

    // Store new record
    public function store(Request $request)
{
    $request->validate([
        'name'   => 'required|string|max:255',
        'icon'   => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
        'status' => 'required|boolean',
    ]);

    // Upload icon image
    if ($request->hasFile('icon')) {
        $iconPath = $request->file('icon')->store('category_icons', 'public');
    }

    \App\Models\CategoryIcon::create([
        'name'   => $request->name,
        'icon'   => $iconPath ?? null,
        'status' => $request->status,
    ]);

    return redirect()->route('category_icons.index')->with('success', 'Category Icon added successfully!');
}


    // Edit form
    public function edit($id)
    {
        $icon = CategoryIcon::findOrFail($id);
        return view('admin.category_icons.edit', compact('icon'));
    }

    // Update record
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'icon' => 'required|max:255',
            'status' => 'required|boolean',
        ]);

        $icon = CategoryIcon::findOrFail($id);
        $icon->update($request->only(['name','icon','status']));

        return redirect()->route('category_icons.index')->with('success', 'Category Icon updated successfully');
    }

    // Delete
    public function destroy($id)
    {
        $icon = CategoryIcon::findOrFail($id);
        $icon->delete();

        return redirect()->route('category_icons.index')->with('success', 'Category Icon deleted successfully');
    }
}
