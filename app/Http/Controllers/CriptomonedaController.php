<?php

namespace App\Http\Controllers;

use App\Http\Requests\Critomoneda\StoreCriptomonedaRequest;
use App\Http\Requests\Critomoneda\UpdateCriptomonedaRequest;
use App\Http\Resources\CriptomonedaResource;
use App\Models\Criptomoneda;
use App\Models\Moneda;
use Illuminate\Http\Request;

class CriptomonedaController extends Controller
{
    public function index(Request $request)
    {
        try {

            if ($request->has('moneda')) {

                $moneda = $request->input('moneda');
                return $this->buscarPorMoneda($moneda);
            }

            $data = Criptomoneda::all();

            return response()->json([
                'success' => true,
                'message' => 'Criptomonedas encontradas',
                'data' => CriptomonedaResource::collection($data)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Criptomoneda no creada',
                'description' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(StoreCriptomonedaRequest $request)
    {
        try {

            $data = [
                'criptomoneda_nombre' => $request->input('nombreCriptomoneda'),
                'criptomoneda_simbolo' => $request->input('simboloCriptomoneda'),
                'moneda_id' => $request->input('monedaId'),
            ];

            $criptomoneda =  Criptomoneda::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Criptomoneda creada',
                'description' => $criptomoneda->criptomoneda_nombre . ' ha sido creada exitosamente.',
                'data' => new  CriptomonedaResource($criptomoneda)
                
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Criptomoneda no creada',
                'description' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateCriptomonedaRequest $request, $id)
    {
        try {

            $criptomoneda = Criptomoneda::findOrFail($id);

            if (!$criptomoneda) {
                return response()->json([
                    'success' => false,
                    'message' => 'Criptomoneda no encontrada',
                    'description' => 'No se encontró la criptomoneda con el ID proporcionado.',
                ], 404);
            }

            $data = [
                'criptomoneda_nombre' => $request->input('nombreCriptomoneda'),
                'criptomoneda_simbolo' => $request->input('simboloCriptomoneda'),
                'moneda_id' => $request->input('monedaId'),
            ];

            $criptomoneda->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Criptomoneda editada',
                'description' => $criptomoneda->criptomoneda_nombre . ' ha sido edita exitosamente.',
                'data' => new  CriptomonedaResource($criptomoneda)
               
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Criptomoneda no edita',
                'description' => $e->getMessage(),
            ], 500);
        }
    }

    private function buscarPorMoneda($in_moneda)
    {

        $moneda = Moneda::where('moneda_nombre', $in_moneda)->first();

        if (!$moneda) {
            return response()->json([
                'success' => false,
                'message' => 'Moneda no encontrada',
                'description' => 'No se encontró la moneda con el nombre proporcionado.',
            ], 404);
        }

        $criptomonedas = Criptomoneda::where('moneda_id', $moneda->id)->get();

        if ($criptomonedas->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontraron criptomonedas para la moneda especificada',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Criptomonedas encontradas',
            'data' => CriptomonedaResource::collection($criptomonedas)
        ], 200);
    }
}
