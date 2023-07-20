<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        return view('menu.paciente');
    }
    public function save(Request $request)
    {
        Paciente::create([
            'dni' => $request['dni'],
            'nombre_pac' => $request['nombre_pac'],
            'apellido_pac' => $request['apellido_pac'],
            'fecha_nac' => $request['fecha_nac'],
            'sexo' => $request['sexo'],
            'direccion' => $request['direccion'],
            'telefono' => $request['telefono'],
        ]);
        return $this->index();
    }
}
