<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Diagnostico;
use App\Models\Doctor;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    public function index(Diagnostico $diagnostico = null, int $http = 200)
    {
        $cita = Cita::join('paciente', 'paciente.dni', '=', 'cita.dni')
            ->select('cita.*', 'paciente.dni', 'paciente.nombre_pac', 'paciente.apellido_pac')
            ->whereNotIn('cita.id_cita', Diagnostico::select('id_cita')->get())
            ->get();
        return view('menu.diagnostico', [
            'diagnostico' => $diagnostico,
            'cita' => $cita,
            'http' => $http,
        ]);
    }
    public function save(Request $request)
    {
        $cita = Diagnostico::create([
            'id_cita' => $request['id_cita'],
            'id_diagnostico' => $request['id_diagnostico'],
            'descripcion' => $request['descripcion'],
        ]);
        return $this->index($cita);
    }
}
