@extends('layouts.menu')

@section('contenido')

<div class="row">
    <h1>{{ $producto->nombre }}</h1>
</div>

<div class="row">
    <div class="col s8">
        <div class="row">
        <img  
                 width="400"
                heigth="300" 
                @if(is_null($producto->imagen))
                    src="{{ asset('img/no_disponible.png') }}">
                 @else
                    src="{{ asset('img/'.$producto->imagen) }}">
                @endif
        </div>
        <div class="row">
            <ul>
                <li>Descripcion: {{ $producto->desc }}</li>
                <li>Categoria: {{ $producto->categoria->nombre }}</li>
                <li>Precio: {{ $producto->precio }}</li>
                <li>Marcca: {{ $producto->marca->nombre }}</li>
            </ul>

        </div>
        
    </div>
    <div class="col s4">
        <form method="POST" action="{{ route('carrito.store') }}">
            @csrf
            <div class="row">
                <h3> Añadir al carrito </h3>
            </div>
            <div class="row">
                <div class="col s4 input-field">
                    <select name="cantidad" id="cantidad">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <label for="cantidad">Cantidad</label>
                </div>
            </div>
            <div class="row">
                <div class="col s4">
                    <button class="btn waves-efects waves-light" type="submit">
                        Añadir
                    </button>
                </div>
            </div>
            <input type="hidden" name="prod_id" value="{{ $producto->id }}">
            <input type="hidden" name="prod_name" value="{{ $producto->nombre }}">
            <input type="hidden" name="prod_cantidad" value="{{ $producto->cantidad }}">
        </form>

    </div>
</div>

@endsection