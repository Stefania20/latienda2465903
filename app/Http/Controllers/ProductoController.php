<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Categoria;

use App\Models\Producto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Aqui va air el catalogo de productos";

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Seleccion de todas las marcas
        $marcas = Marca::all();

        //Seleccion de todas las categorias
        $categorias = Categoria::all();

        //Mostrar la vista
        //Llevandole marcas y categorias
        return view('productos.new')
                    ->with('marcas' , $marcas)
                    ->with('categorias' , $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //1.Establecer las reglas de validadion que apliquen a cada campo
        $reglas =[
            "nombre" => 'required|alpha',
            "desc" => 'required|min:20|max:50',
            "precio" => 'required|numeric',
            "marca" => 'required',
            "categoria" => 'required'

        ];

        //mensajes:
        $mensajes=[
            "required" =>"Campo obligatorio",
            "alpha" => "Solo letras",
            "min" => "Minimo 20 caracteres",
            "max" => "Maximo 50 caracteres",
            "numeric" => "Solo numeros"
            
        ];

        //2. Crear el objeto validador
        $v = Validator::make($r->all() , 
                            $reglas,
                            $mensajes);

        //3.Validar le input data (datos)
        if($v->fails()){
            //validacion fallida
            //Redireccionar al formulario
            return redirect('productos/create')
                    ->withErrors($v)
                    ->withInput();  


        }else{
            //validacion correcta

            //Crear nuevo producto<<entity>>
            $p=new Producto;
            //Asignar valores a los atributos del producto
            $p->nombre = $r->nombre;
            $p->desc = $r->desc;
            $p->precio = $r->precio;
            $p->marca_id = $r->marca;
            $p->categoria_id = $r->categoria;
            //Guardar en db
            $p->save();
            
            //Redireccionar al formulario
            //Con mensaje exitoso(session)
            return redirect('productos/create')
            ->with('mensajito' , "Producto registrado");

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "Aqui van los detalles de producto con id: $producto ";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "Aqui va a ir el formulario para actualizar el producto id:$producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
