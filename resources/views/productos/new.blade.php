@extends('layouts.menu')
 
@section('contenido')
@if(session('mensajito'))
<div class="row">
    <span class="blue-text text-darken-2">{{ session('mensajito') }}</span>
</div>
@endif
<div class="row">
    <h1 class="purple-text text-darken-4">Nuevo Producto</h1>
</div>
<div class="row">
    <form 
    method="POST"
    action="{{ route('productos.store') }}"
    class="col s8"
    enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="input-field col s8">
                <input 
                placeholder="Nombre del Producto"
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre') }}"/>
                <label for="nombre">Nombre</label>
                <span class="blue-text text-darken-2">{{ $errors->first('nombre') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <textarea 
                name="desc" 
                id="desc" 
                class="materialize-textarea">
                {{ old('desc') }}
                </textarea>
                <label for="desc">Descripción:</label>
                <span class="blue-text text-darken-2">{{ $errors->first('desc')}}</span>
            </div>
        </div>    
        <div class="row">
            <div class="input-field col s8">
                <input 
                    placeholder="Precio del producto"
                    type="text"
                    id="precio"
                    name="precio"
                    value="{{ old('precio') }}"/>
                <label for="precio">Precio</label>
                <span class="blue-text text-darken-2">{{ $errors->first('precio') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <select name="marca" id="marca">
                    <option value="">Elija marca</option>
                    @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}">
                        {{ $marca->nombre}}
                    </option>
                     @endforeach
                </select>
                <label for="marca">Elija marca</label>
                <span class="blue-text text-darken-2">{{ $errors->first('marca') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <select name="categoria" id="categoria">
                <option value="">Elija categoria</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">
                            {{ $categoria->nombre}}
                        </option>
                    @endforeach
                </select>
                <label for="categoria">Elija categoria</label>
                <span class="blue-text text-darken-2">{{ $errors->first('categoria') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="file-field input-field col s8">
                <div class="btn">
                    <span>
                        Imagen del Producto
                    </span>
                    <input type="file" name="imagen" >
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path" type="text">
                </div>
                <span class="blue-text text-darken-2">{{ $errors->first('imagen') }}</span>
            </div>
        </div>
        <div class="row">
            <button class="btn waves-efects waves-light" type="submit">
                Guardar
            </button>
        </div>
    </form>
</div>    
@endsection