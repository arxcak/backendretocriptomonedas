<?php

namespace App\Http\Controllers;

use App\Http\Requests\Moneda\StoreMonedaRequest;
use App\Http\Resources\MonedaResource;
use App\Models\Moneda;

class MonedaController extends Controller
{
    public function index()
    {
        try {
            $data = Moneda::all();

            return response()->json([
                'success' => true,
                'message' => 'Lista de monedas',
                'description' => ' Lista',
                'data' => MonedaResource::collection($data)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Moneda no creada',
                'description' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(StoreMonedaRequest $request)
    {
        try {

            $data = [
                'moneda_nombre' => $request->input('nombreMoneda'),
                'moneda_simbolo' => $request->input('simboloMoneda'),
            ];

            $moneda = Moneda::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Moneda creada',
                'description' => $moneda->moneda_nombre . ' ha sido creada exitosamente.',
                'data' => [
                    'moneda' => new MonedaResource($moneda)
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Moneda no creada',
                'description' => $e->getMessage(),
            ], 500);
        }
    }
}
