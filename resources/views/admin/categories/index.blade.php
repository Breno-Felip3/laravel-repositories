@extends('adminlte::page')

@section('title', 'Listagem de Categorias')

@section('content_header')
    <h1>
        <a href="{{route('create')}}" class="btn btn-primary">Adicionar Categoria</a>
        Categorias
    </h1>
    
@stop

@section('content')
    <div class="contente row">
        <div class="box">
            <div class="box-body">
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
                                    <td><a class="btn btn-warning"  href="{{route("show", $category->id)}}">Editar</a></td>
                                    <td><form action="{{ route('delete', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                    </form></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop


{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

@section('js')
    <script> console.log('Hi!'); </script>
@stop