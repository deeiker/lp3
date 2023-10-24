<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formapagos extends Model
{
    public $table = 'forma_pagos';

    public $fillable = [
        'descripcion'
    ];

    protected $casts = [
        'descripcion' => 'string'
    ];

    public static array $rules = [
        'descripcion' => 'required|string|max:100'
    ];

    public function cobros(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Cobro::class, 'id_forma');
    }
}
