<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
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
