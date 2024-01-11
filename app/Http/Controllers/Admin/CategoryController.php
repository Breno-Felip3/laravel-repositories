<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategory;
use App\Models\Category;

class CategoryController extends Controller
{
   
    public function index()
    {
        $categories = Category::all();

        return view('admin/categories/index', compact('categories'));
    }

  
    public function create()
    {
        return view('admin/categories.create');
    }

    public function store(StoreUpdateCategory $request)
    {
        $dados = [
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->descricao
        ];

        Category::create($dados);

        return redirect()->route('index');
        
    }

   
    public function show(string $id)
    {
        $category = Category::find($id);

        if(!$category){
            return redirect()->back();
        }

        return view('admin/categories/edit', compact('category'));
    }

    public function update(StoreUpdateCategory $request, $id)
    {
        $category = Category::find($id);

        $dados = [
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->descricao
        ];

        $category->update($dados);

        return redirect()->route('index');
    }

   
    public function destroy(string $id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('index');
    }
}
