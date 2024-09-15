@extends('adminlte::page')

@section('title', 'Listagem de Categorias')

@section('content_header')
    <h1>
        <a href="{{route('product.create')}}" class="btn btn-primary">Adicionar</a>
        Produtos
    </h1>
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://">Dashboard</a></li>
        <li class=" active breadcrumb-item"><a href="{{route('index')}}">Categorias</a></li>
    </ol>
    
@stop

@section('content')
    <div class="contente row">
    
        <div class="box box-success">
           
            <form class="form form-inline" action=" {{route('search')}}" method="POST">
                @csrf
                <input type="text" name="search" placeholder="Pesquisar" class="form-control">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </form>

            @if (@isset($search))
            <br>
                <a href="{{ route('index')}}">(x) Limpar Resultado da Pesquisa</a>               
            @endif
            
            <div class="box-body">
                <br>
                @include('admin/categories/include/alerts')

                <div class="table-responsive">
                    <table class="table table-hover" style="width: 100%">
                        <thead>
                          <tr>
                            <th scope="col">Categoria</th>
                            <th scope="col">Nome</th>
                            <th scope="col">url</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->category->title}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->url}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->description}}</td>
                                    <td><a class="btn btn-warning"  href="{{route("product.edit", $product->id)}}">Editar</a></td>
                                    <td><a class="btn btn-primary"  href="{{route("product.show", $product->id)}}">Detalhes</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(isset($search))
                        {{ $products->appends(['search' => $search])->links('pagination::bootstrap-4') }}
                    @else
                        {{ $products->links('pagination::bootstrap-4') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop