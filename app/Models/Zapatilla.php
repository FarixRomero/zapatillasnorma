<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Zapatilla
 *
 * @property $id
 * @property $codigo
 * @property $nombre
 * @property $precio
 * @property $cantidad
 * @property $url_imagen
 * @property $detalles
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Zapatilla extends Model
{
    
    static $rules = [
		'codigo' => 'required',
		// 'nombre' => 'required',
		'precio_compra' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','nombre','precio_compra','precio_venta','cantidad','url_imagen','talla'];

    public function registros()
    {
        return $this->hasMany(RegistroVentas::class,'zapatillas_id','id');
        // return $this->hasMany(RegistroVentas::class);

    }

}
