@csrf
<div class="mb-3">
<select name="category_id" id="category_id" class="form-select form-control">

    @if (@isset($product))
    
        {{-- Para editar um produto existente --}}
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $product->category->id ? 'selected' : '' }}>
                {{ $category->title }}
            </option> 
        @endforeach   
    @else

        {{-- para cadastrar um novo produto --}}
        <option selected>Selecione a categoria</option>
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
        
    @endif

</select>

</div>

<div class="mb-3">
    <label for="titulo" class="form-label">Nome</label>
    <input type="text" value="{{$product->name ?? old('name')}}" class="form-control" name="name" id="name">
</div>

<div class="mb-3">
    <label for="url" class="form-label">URL</label>
    <input type="text" value="{{$product->url ?? old('url')}}" class="form-control" id="url" name="url">
</div>

<div class="mb-3">
    <label for="url" class="form-label">Preço</label>
    <input type="text" value="{{$product->price ?? old('url')}}" class="form-control" id="price" name="price">
</div>

<div class="mb-3">
    <textarea name="description"  placeholder="Descrição" cols="30">{{$product->description ?? old('descricao')}}</textarea>
</div>