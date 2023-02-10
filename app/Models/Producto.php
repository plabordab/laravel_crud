<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    //Nombre de la tabla
    //por defecto el nombre del modelo en plural
    //y minúscula
    protected $table = 'productos';


    //Clave principal
    //Por defecto id de tipo int autoincrement
    protected $primaryKey="cod";
    public $incrementing=false;
    protected $keyType="string";

    //Timestamps
    //Por defecto espera gestionar dos campos
    //created_at y updated_at
    //Información temporal de cuándo modificación de valores
    //Si no van a existir en la tabla
    public $timestamps = false;
}
