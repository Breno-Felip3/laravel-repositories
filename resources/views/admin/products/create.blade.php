@extends('adminlte::page')

@section('title', 'Cadastro de Categoria')

@section('content_header')
    <h1>
        Cadastrar novo Produto
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://">Dashboard</a></li>
        <li class=" active breadcrumb-item"><a href="{{route('product.index')}}">Categorias</a></li>
        <li class=" active breadcrumb-item"><a href="{{route('product.create')}}">Cadastrar</a></li>
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
                    {{Form::open(['route' => 'product.store', 'class' => 'form'])}}
                        @include('admin/products/form')
                    {{Form::close()}}
                    
                 
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