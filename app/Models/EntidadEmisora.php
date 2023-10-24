<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntidadEmisora extends Model
{
    public $table = 'entidad_emisora';

    public $fillable = [
        'enti_descri'
    ];

    protected $casts = [
        'enti_descri' => 'string'
    ];

    public static array $rules = [
        'enti_descri' => 'required|string|max:45'
    ];

    public function cobros(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Cobro::class, 'enti_cod');
    }
}
