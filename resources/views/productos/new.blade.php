@extends('layouts.menu')
 
@section('contenido')
<div class="row">
    <h1 class="purple-text text-darken-4">Nuevo Producto</h1>
</div>
<div class="row">
    <form class="col s8">
        <div class="row">
            <div class="input-field col s8">
                <input 
                placeholder="Nombre del Producto"
                type="text"
                id="nombre"
                name="nombre"/>
                <label for="nombre">Nombre</label>
            </div>
        </div>
   
</div>
<div class="row">
            <div class="input-field col s8">
              <textarea name="desc" id="desc" class="materialize-textarea"></textarea>
              <label for="desc">Descripción:</label>
        </div>
<div class="row">
    <div class="input-field col s8">
        <input 
        placeholder="Precio del producto"
        type="text"
        id="precio"
        name="precio"/>
        <label for="precio">Precio</label>
        
    </div>
</div>
<div class="row">
    <div class="file-field input-field col s8">
        <div class="btn">
            <span>
                Imagen del Producto
            </span>
            <input type="file" name="imagen">
        </div>
        <div class="file-path-wrapper">
            <input class="file-path" type="text">
        </div>
    </div>
</div>
<div class="row">

    <div class="col s8 input-field">
   
        <select name="" id="marca">
            @foreach($marcas as $marca)
                 <option value="">
                        {{ $marca->nombre}}
                </option>
        
        @endforeach
        </select>
        <label for="marca">Elija marca</label>

    </div>

</div>
<div class="row">
    <button class="btn waves-efects waves-light" type="submit">
        Guardar
    </button>
</div>
</form>
@endsection