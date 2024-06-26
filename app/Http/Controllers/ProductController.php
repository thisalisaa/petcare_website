<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'categories' => 'required|array',
        'categories.*.name' => 'required',
        'categories.*.price' => 'required|numeric',
        'categories.*.discount' => 'required|integer',
    ]);

    $fileName = time() . '.' . $request->photo->extension();
    $request->photo->storeAs('public/images', $fileName);

    $product = Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'photo' => $fileName,
    ]);

    foreach ($request->categories as $categoryData) {
        $categoryData['final_price'] = $categoryData['price'] - ($categoryData['price'] * $categoryData['discount'] / 100);
        $category = Category::create($categoryData);
        $product->categories()->attach($category->id);
    }

    return redirect()->route('products.index');
}


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'categories' => 'required|array',
        'categories.*.name' => 'required',
        'categories.*.price' => 'required|numeric',
        'categories.*.discount' => 'required|integer',
    ]);

    $product = Product::findOrFail($id);

    if ($request->hasFile('photo')) {
        $fileName = time() . '.' . $request->photo->extension();
        $request->photo->storeAs('public/images', $fileName);
        $product->update(['photo' => $fileName]);
    }

    $product->update([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    $product->categories()->detach();

    foreach ($request->categories as $categoryData) {
        $categoryData['final_price'] = $categoryData['price'] - ($categoryData['price'] * $categoryData['discount'] / 100);
        $category = Category::create($categoryData);
        $product->categories()->attach($category->id);
    }

    return redirect()->route('products.index');
}

    public function destroy($category_id)
{
    $category = Category::findOrFail($category_id);
    $category->delete(); // Menghapus kategori itu sendiri

    return redirect()->route('products.index');
}

}