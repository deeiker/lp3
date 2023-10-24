<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    public $table = 'sucursal';

    public $fillable = [
        'suc_descri',
        'suc_direccion',
        'suc_telefono'
    ];

    protected $casts = [
        'suc_descri' => 'string',
        'suc_direccion' => 'string',
        'suc_telefono' => 'string'
    ];

    public static array $rules = [
        'suc_descri' => 'required|string',
        'suc_direccion' => 'nullable|string|max:100',
        'suc_telefono' => 'nullable|string|max:45'
    ];

    public function cajas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Caja::class, 'cod_suc');
    }

    public function ventas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Venta::class, 'cod_suc');
    }

    public function articulos(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Articulo::class, 'stock');
    }
}
