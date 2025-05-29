<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criptomoneda extends Model
{
    protected $fillable = ['criptomoneda_nombre', 'criptomoneda_simbolo', 'moneda_id'];

    public function moneda()
    {
        return $this->belongsTo(Moneda::class);
    }
}
