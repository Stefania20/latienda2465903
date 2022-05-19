<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//primera ruta
Route::get('holi' , function(){ 
    echo"holi 2465903"; 
});

// ruta arreglos:
Route::get('arreglo' , function(){
    $estudiantes = [
       "CA" => 1,
       "JO" => true,
       "AN" => 1.78
     ];
   /*  echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";*/

// recorrer el arreglo
   foreach($estudiantes as $e){
    echo $e."<hr />";
 }

//agrear elemento en PHP
$estudiantes["CR"] = "Stefania";
var_dump($estudiantes);
});


Route::get('paises',function(){
    //arreglo paises:
    $paises = [
        "Colombia" => [
            "capital" => "Bogota",
            "moneda" => "Peso",
            "poblacion" => 51,
            "ciudades" => [
                "Medellin",
                "Cali",
                "Barranquilla"

            ]
        ],
        "Peru" => [
            "capital" => "Lima",
            "moneda" => "Sol",
            "poblacion" => 32,
            "ciudades" => [
                "Arequipa",
                "Trujillo"
            ]
        ],
        "Paraguay"  => [
            "capital" => "Asuncion",
            "moneda" => "Guarani",
            "poblacion" => 7,
            "ciudades" => [
                "Luque"
            ]
                
        ],
        "Venezuela"  => [
            "capital" => "Caracas",
            "moneda" => "Bolivar",
            "poblacion" => 28,
            "ciudades" => [
                "Valencia",
                "Maracaibo"
            ]
        ],
        "Chile"  => [
            "capital" => "Santiago",
            "moneda" => "Peso Chileno",
            "poblacion" => 19,
            "ciudades" => [
                "Puente Alto"
            ]
        ]
    ];

    // analizar la variable paises:

   /* echo "<pre>";
    var_dump($paises);
    echo "</pre>";*/


    return view('paises')
    ->with("paises" , $paises);

});

Route::get('prueba', function(){
    return view('productos.new');
} );

//Rutas rest - resource
Route::resource('productos' , ProductoController::class);
