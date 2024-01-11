@csrf
<div class="mb-3">
    <label for="titulo" class="form-label">Titulo</label>
    <input type="text" value="{{$category->title ?? old('title')}}" class="form-control" name="title" id="title">
</div>

<div class="mb-3">
    <label for="url" class="form-label">URL</label>
    <input type="text" value="{{$category->url ?? old('url')}}" class="form-control" id="url" name="url">
 </div>

<div class="mb-3">
    <textarea name="descricao"  placeholder="Descrição" cols="30">{{$category->description ?? old('descricao')}}</textarea>
</div>