<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $primaryKey = 'idProducto';
    public $timestamps=false;

    public function relMarca()
    {
        //return $this->belongsTo('tablaOrigen', 'foreignKey')
        return $this->belongsTo('App\Marca', 'idMarca');
    }

    public function relCategoria()
    {
        return $this->belongsTo('App\Categoria', 'idCategoria');
    }
}
