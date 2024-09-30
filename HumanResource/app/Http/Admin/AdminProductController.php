<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - Online Store";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            'image' => 'image|nullable',
        ]);

        $creationData = $request->only(["name", "description", "price"]);

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $imageName);
            $creationData["image"] = $imageName;
        } else {
            $creationData["image"] = "game.png";
        }

        Product::create($creationData);

        return back()->with('success', 'Product added successfully!');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return back()->with('success', 'Product deleted successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $viewData = [
            "title" => "Edit Product",
            "product" => $product
        ];
        return view('admin.product.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            'image' => 'image|nullable',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            $imageName = $product->id . "." . $request->file('image')->extension();
            $request->file('image')->storeAs('public/images', $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully!');
    }
}
