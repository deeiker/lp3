<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    public $table = 'ventas';

    public $fillable = [
        'user_id',
        'id_cliente',
        'ven_fecha',
        'ven_condicion',
        'ven_total',
        'ven_estado',
        'cant_cuo',
        'nro_factura',
        'ape_nro',
        'cod_suc'
    ];

    protected $casts = [
        'ven_fecha' => 'date',
        'ven_condicion' => 'string',
        'ven_total' => 'decimal:0',
        'ven_estado' => 'string',
        'nro_factura' => 'string'
    ];

    public static array $rules = [
        'user_id' => 'nullable',
        'id_cliente' => 'required',
        'ven_fecha' => 'nullable',
        'ven_condicion' => 'nullable|string|max:45',
        'ven_total' => 'nullable|numeric',
        'ven_estado' => 'nullable|string|max:20',
        'cant_cuo' => 'nullable',
        'nro_factura' => 'nullable|string|max:45',
        'ape_nro' => 'required',
        'cod_suc' => 'required'
    ];

    public function codSuc(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Sucursal::class, 'cod_suc');
    }

    public function apeNro(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\AperturaCierre::class, 'ape_nro');
    }

    public function idCliente(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'id_cliente');
    }

    public function cobros(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Cobro::class, 'id_venta');
    }

    public function ctasCobrars(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\CtasCobrar::class, 'id_venta');
    }

    public function articulos(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Articulo::class, 'det_venta');
    }
}
