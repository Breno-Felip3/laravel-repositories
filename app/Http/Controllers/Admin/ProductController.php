<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProduct;
use App\Models\Category;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $products = $this->repository->getAll();

        return view('admin/products/index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin/products/create', compact('categories'));
    }

    public function store(StoreUpdateProduct $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('product.index');
    }

    public function show(string $id)
    {
        if (!$product = $this->repository->findById($id)){
            return redirect()->back();
        } 

        return view('admin/products/show', compact('product'));
    }

    public function edit(string $id)
    {
        if (!$product = $this->repository->findById($id)){
            return redirect()->back();
        } 
        
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(StoreUpdateProduct $request, string $id)
    {
        $this->repository->update($id, $request->all());

        return redirect()->route('product.index')->withSuccess('Produto atualizado com suceso');
    }

    public function destroy(string $id)
    {
        $this->repository->delete($id);
        return redirect()->route('product.index')->withSuccess('Produto excluido com suceso');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $products = $this->repository->search($search);
        
        return view('admin/products/index', compact('products'));
    }   
}
