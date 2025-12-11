<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a category and all its products.
     */
    public function show(Category $category)
    {
        $products = $category->products()
            ->latest()
            ->paginate(12);

        return view('categories.show', [
            'category' => $category->load('products'),
            'products' => $products,
        ]);
    }

    /**
     * Edit category (admin only).
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update category in database (admin only).
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name) . '-' . Str::random(5);

        $category->save();

        return redirect()
            ->route('admin.categories')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Delete category (admin only).
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('admin.categories')
            ->with('success', 'Category deleted successfully.');
    }
}
