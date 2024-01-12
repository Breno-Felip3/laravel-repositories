@extends('adminlte::page')

@section('title', 'Listagem de Categorias')

@section('content_header')
    <h1>
        <a href="{{route('create')}}" class="btn btn-primary">Adicionar</a>
        Categorias
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
                            <th scope="col">id</th>
                            <th scope="col">Título</th>
                            <th scope="col">url</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{$category->id}}</th>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->url}}</td>
                                    <td>{{$category->description}}</td>
                                    <td><a class="btn btn-warning"  href="{{route("edit", $category->id)}}">Editar</a></td>
                                    <td><a class="btn btn-primary"  href="{{route("show", $category->id)}}">Detalhes</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                        @if(isset($search))
                        {{ $categories->appends(['search' => $search])->links('pagination::bootstrap-4') }}
                        @else
                            {{ $categories->links('pagination::bootstrap-4') }}
                        @endif
                
                </div>
            </div>
        </div>
    </div>
@stop