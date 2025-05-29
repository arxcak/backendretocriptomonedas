<?php

namespace App\Http\Requests\Moneda;

use Illuminate\Foundation\Http\FormRequest;

class StoreMonedaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombreMoneda' => 'required|string|max:50|unique:monedas,moneda_nombre',
            'simboloMoneda' => 'required|string|max:10|unique:monedas,moneda_simbolo'
        ];
    }
}
