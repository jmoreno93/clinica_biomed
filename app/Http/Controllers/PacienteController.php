<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Responses\Responser;

class PacienteController extends Controller
{
    use Responser;
    public function index(Paciente $paciente = null, int $http = 200)
    {
        $list = Paciente::orderBy('created_at')->get();
        return view('menu.paciente', [
            'list' => $list,
            'paciente' => $paciente,
            'http' => $http,
        ]);
    }
    public function save(Request $request)
    {
        $check = Paciente::find($request['dni']);
        if(!is_null($check))
        {
            return $this->errorResponse('El paciente ya existe');
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
        $paciente['fecha_nac'] = date_format(date_create($paciente['fecha_nac']), 'd/m/Y');
        return $this->successResponse($paciente);
    }
}
