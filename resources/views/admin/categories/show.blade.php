@extends('adminlte::page')

@section('title', ' Detalhes')

@section('content_header')
    <h1>
        Categoria {{$category->title}}
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://">Dashboard</a></li>
        <li class=" active breadcrumb-item"><a href="{{route('index')}}">Categorias</a></li>
        <li class=" active breadcrumb-item"><a href="{{route('show', $category->id)}}">Detalhes</a></li>
    </ol>
    
@stop

@section('content')
    <div class="contente row">
        <div class="box">
            <div class="box-body">
                <p> <strong>ID: </strong>{{$category->id}}</p>
                <p> <strong>Titulo: </strong>{{$category->title}}</p>
                <p> <strong>URL: </strong>{{$category->url}}</p>
                <p> <strong>Descrição: </strong>{{$category->description}}</p>
                <hr>
                <td><form action="{{ route('delete', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                </form></td>
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