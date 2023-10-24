<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public $table = 'marcas';

    public $fillable = [
        'mar_descrip'
    ];

    protected $casts = [
        'mar_descrip' => 'string'
    ];

    public static array $rules = [
        'mar_descrip' => 'required|string|max:45'
    ];

    public function articulos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Articulo::class, 'mar_cod');
    }
}
