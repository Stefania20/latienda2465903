<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Producto extends Model
{
    use HasFactory;

    //Establecer relacion de producto con marca
    //Toda relacion se expresa con una funcion
    public function  categoria(){
        return$this->belongsTo( Categoria::class);
    }

    public function  marca(){
        return$this->belongsTo( Marca::class);
    }
}
