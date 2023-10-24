<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AperturaCierre extends Model
{
    public $table = 'apertura_cierre';

    public $fillable = [
        'caj_cod',
        'user_id',
        'ape_fecha',
        'ape_monto_inicial',
        'ape_mon_cierre',
        'ape_fecha_cierre',
        'ape_total',
        'ape_estado'
    ];

    protected $casts = [
        'ape_fecha' => 'date',
        'ape_fecha_cierre' => 'date',
        'ape_estado' => 'string'
    ];

    public static array $rules = [
        'caj_cod' => 'required',
        'user_id' => 'nullable',
        'ape_fecha' => 'nullable',
        'ape_monto_inicial' => 'nullable',
        'ape_mon_cierre' => 'nullable',
        'ape_fecha_cierre' => 'nullable',
        'ape_total' => 'nullable',
        'ape_estado' => 'nullable|string|max:20'
    ];

    public function cajCod(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Caja::class, 'caj_cod');
    }

    public function ventas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Venta::class, 'ape_nro');
    }
}
