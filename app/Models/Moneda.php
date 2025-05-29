<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    protected $fillable = ['moneda_nombre', 'moneda_simbolo'];

    public function criptomonedas()
    {
        return $this->hasMany(Criptomoneda::class);
    }
}
