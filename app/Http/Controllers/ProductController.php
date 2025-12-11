<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display all products (optional — for shop page).
     */
    public function index()
    {
        // Coming soon: Full shop listing
    }

    /**
     * Show product creation form (admin only).
     */
    public function create()
    {
        // Coming soon: Admin product creation
    }

    /**
     * Store a newly created product (admin only).
     */
    public function store(Request $request)
    {
        // Coming soon: Admin product upload
    }

    /**
     * Display a single product using its slug.
     */
    public function show($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();

        // Fetch related products from the same category
        $related = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'related'));
    }

    /**
     * Edit product (admin only).
     */
    public function edit(Product $product)
    {
        // Coming soon: Admin product editing
    }

    /**
     * Update product in database (admin only).
     */
    public function update(Request $request, Product $product)
    {
        // Coming soon: Admin product update
    }

    /**
     * Delete product (admin only).
     */
    public function destroy(Product $product)
    {
        // Coming soon: Admin delete feature
    }
}
