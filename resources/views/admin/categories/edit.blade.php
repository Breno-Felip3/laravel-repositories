@extends('adminlte::page')

@section('title', 'Cadastro de Categoria')

@section('content_header')
    <h1>
        Editar Categoria
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://">Dashboard</a></li>
        <li class=" active breadcrumb-item"><a href="{{route('index')}}">Categorias</a></li>
        <li class=" active breadcrumb-item"><a href="{{route('edit', $category->id)}}">Editar</a></li>
    </ol>
    
@stop

@section('content')
    <div class="contente row">
        <div class="box">
            <div class="box-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                
                <div class="table-responsive">
                    <form action="{{route('update', $category->id)}}" method="POST">
                        @method('PUT')
                       
                        @include('admin/categories/form')
                          
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
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