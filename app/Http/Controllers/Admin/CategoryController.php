<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategory;
use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $repository;
    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
   
    public function index()
    {
        $categories = $this->repository->paginate();

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

        $this->repository->create($dados);

        return redirect()->route('index')->withSuccess('success', 'Cadastro Realizado com Sucesso');
    }
   
    public function edit(string $id)
    {
        $category = $this->repository->findById($id);

        if(!$category){
            return redirect()->back();
        }

        return view('admin/categories/edit', compact('category'));
    }

    public function update(StoreUpdateCategory $request, $id)
    {
        $dados = [
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->descricao
        ];

        $this->repository->update($id, $dados);

        return redirect()->route('index');
    }

    public function show(string $id)
    {
        $category = $this->repository->findById($id);
        if(!$category){
            return redirect()->back();
        }

        return view('admin/categories/show', compact('category'));
    }

    public function destroy(string $id)
    {
        $this->repository->delete($id);
        return redirect()->route('index');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $categories = $this->repository->search($search);
        
        return view('admin/categories/index', compact('categories', 'search'));
    }   
}
