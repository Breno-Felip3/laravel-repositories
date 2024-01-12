<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate();

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

        return redirect()->route('index')->with('success', 'Cadastro Realizado com Sucesso');
        
    }
   
    public function edit(string $id)
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

    public function show(string $id)
    {
        $category = Category::find($id);

        if(!$category){
            return redirect()->back();
        }

        return view('admin/categories/show', compact('category'));
    }

   
    public function destroy(string $id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('index');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $categories = Category::where('title', 'like', "%$search%")
                        ->orWhere('url', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%")
                        ->orderBy('id', 'desc')
                        ->paginate();
        
        return view('admin/categories/index', compact('categories', 'search'));
    }   
}
