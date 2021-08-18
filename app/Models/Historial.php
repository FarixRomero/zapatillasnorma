<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Historial
 *
 * @property $id
 * @property $zapatillas_id
 * @property $precio_venta
 * @property $porcantaje_ganancia
 * @property $fecha_venta
 * @property $created_at
 * @property $updated_at
 *
 * @property Zapatilla $zapatilla
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Historial extends Model
{
    
    static $rules = [
		'zapatillas_id' => 'required',
		'precio_venta' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['zapatillas_id','precio_venta','porcantaje_ganancia','fecha_venta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function zapatilla()
    {
        return $this->hasOne('App\Models\Zapatilla', 'id', 'zapatillas_id');
    }
    

}
