<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index(Medicamento $medicamento = null, int $http = 200)
    {
        return view('menu.medicamento', [
            'medicamento' => $medicamento,
            'http' => $http,
        ]);
    }
    public function save(Request $request)
    {
        $check = Medicamento::find($request['id_medicamento']);
        if(!is_null($check))
        {
            return $this->index($check, 422);
        }
        $paciente = Medicamento::create([
            'nombre_medicamento' => $request['nombre_medicamento'],
            'presentacion' => $request['presentacion'],
            'tipo' => $request['tipo'],
        ]);
        return $this->index($paciente);
    }
}
