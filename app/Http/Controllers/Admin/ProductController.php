<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProduct;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->with('category')->paginate();

        return view('admin/products/index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin/products/create', compact('categories'));
    }

    public function store(StoreUpdateProduct $request)
    {
        
        $dados = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'url' => $request->url,
            'price' => $request->price,
            'description' => $request->description
        ];
        
        Product::create($dados);

        return redirect()->route('product.index');

    }

    public function show(string $id)
    {
        if (!$product = Product::with('category')->find($id)){
            return redirect()->back();
        } 

        return view('admin/products/show', compact('product'));
    }

    public function edit(string $id)
    {
        if (!$product = Product::find($id)){
            return redirect()->back();
        } 
        
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(StoreUpdateProduct $request, string $id)
    {
        if (!$product = Product::find($id)){
            return redirect()->back();
        };

        $dados = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'url' => $request->url,
            'price' => $request->price,
            'description' => $request->description
        ];

        $product->update($dados);

        return redirect()->route('product.index')->with('Produto atualizado com suceso');
    }

    public function destroy(string $id)
    {
        if (!$product = Product::find($id)){
            return redirect()->back();
        };

        $product->delete();

        return redirect()->route('product.index')->with('Produto excluido com suceso');
    }
}
