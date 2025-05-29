<?php

namespace App\Http\Requests\Critomoneda;

use Illuminate\Foundation\Http\FormRequest;

class StoreCriptomonedaRequest extends FormRequest
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
            'nombreCriptomoneda' => 'required|string|max:50|unique:monedas,moneda_nombre|unique:criptomonedas,criptomoneda_nombre',
            'simboloCriptomoneda' => 'required|string|max:10|unique:monedas,moneda_simbolo|unique:criptomonedas,criptomoneda_simbolo',
            'monedaId' => 'required|exists:monedas,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nombreCriptomoneda.required' => 'El nombre de la criptomoneda es obligatorio.',
            'nombreCriptomoneda.string' => 'El nombre de la criptomoneda debe ser una cadena de texto.',
            'nombreCriptomoneda.max' => 'El nombre de la criptomoneda no puede exceder los 255 caracteres.',
            'simboloCriptomoneda.unique:monedas,nombre' => 'El símbolo ya está registrado en la tabla de monedas.',
            'simboloCriptomoneda.unique:criptomonedas,nombre' => 'El símbolo ya está registrado en la tabla de criptomonedas.',

            'simboloCriptomoneda.required' => 'El símbolo de la criptomoneda es obligatorio.',
            'simboloCriptomoneda.string' => 'El símbolo de la criptomoneda debe ser una cadena de texto.',
            'simboloCriptomoneda.max' => 'El símbolo de la criptomoneda no puede exceder los 10 caracteres.',
            'simboloCriptomoneda.unique:monedas,simbolo' => 'El símbolo ya está registrado en la tabla de monedas.',
            'simboloCriptomoneda.unique:criptomonedas,simbolo' => 'El símbolo ya está registrado en la tabla de criptomonedas.',

            'monedaId.required' => 'El ID de la moneda asociada es obligatorio.',
            'monedaId.exists' => 'La moneda asociada no existe en la base de datos.',
        ];
    }
}
