<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CriptomonedaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombreCritomonena' => $this->criptomoneda_nombre,
            'simboloCritomonena' => $this->criptomoneda_simbolo,
            'moneda' => new MonedaResource($this->moneda()->first()),
        ];
    }
}
