@extends('adminlte::page')

@section('title', ' Detalhes')

@section('content_header')
    <h1>
        Produto {{$product->name}}
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://">Dashboard</a></li>
        <li class=" active breadcrumb-item"><a href="{{route('index')}}">Categorias</a></li>
        <li class=" active breadcrumb-item"><a href="{{route('show', $product->id)}}">Detalhes</a></li>
    </ol>
    
@stop

@section('content')
    <div class="contente row">
        <div class="box">
            <div class="box-body">
                <p> <strong>ID: </strong>{{$product->id}}</p>
                <p> <strong>Categoria: </strong>{{$product->category->title}}</p>
                <p> <strong>Nome: </strong>{{$product->name}}</p>
                <p> <strong>URL: </strong>{{$product->url}}</p>
                <p> <strong>Preço: </strong>{{$product->price}}</p>
                <p> <strong>Descrição: </strong>{{$product->description}}</p>
                <hr>
                <td><form action="{{ route('product.delete', $product->id) }}" method="POST">
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