<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * PUBLIC
     * Display a category and its products.
     */
    public function show(Category $category)
    {
        $products = $category->products()
            ->latest()
            ->paginate(12);

        return view('categories.show', compact('category', 'products'));
    }

    /**
     * ADMIN
     * List all categories.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * ADMIN
     * Show create category form.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * ADMIN
     * Store new category.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()
            ->route('admin.categories')
            ->with('success', 'Category created successfully.');
    }

    /**
     * ADMIN
     * Edit category form.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * ADMIN
     * Update category.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->name = $request->name;

        // Only generate slug if missing
        if (!$category->slug) {
            $category->slug = Str::slug($request->name);
        }

        $category->save();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * ADMIN
     * Delete category.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('admin.categories')
            ->with('success', 'Category deleted successfully.');
    }
}
