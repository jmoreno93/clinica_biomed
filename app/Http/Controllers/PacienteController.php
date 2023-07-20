<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index(Paciente $paciente = null, int $http = 200)
    {
        return view('menu.paciente', [
            'paciente' => $paciente,
            'http' => $http,
        ]);
    }
    public function save(Request $request)
    {
        $check = Paciente::find($request['dni']);
        if(!is_null($check))
        {
            return $this->index($check, 422);
        }
        $paciente = Paciente::create([
            'dni' => $request['dni'],
            'nombre_pac' => $request['nombre_pac'],
            'apellido_pac' => $request['apellido_pac'],
            'fecha_nac' => $request['fecha_nac'],
            'sexo' => $request['sexo'],
            'direccion' => $request['direccion'],
            'telefono' => $request['telefono'],
        ]);
        return $this->index($paciente);
    }
}
