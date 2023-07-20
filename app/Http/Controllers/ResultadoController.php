<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;

class ResultadoController extends Controller
{
    public function index(int $http = 200)
    {
        $diagnostico = Diagnostico::join('cita', 'cita.id_cita', '=', 'diagnostico.id_cita')
            ->join('paciente', 'paciente.dni', '=', 'cita.dni')
            ->join('doctor', 'doctor.id_doctor', 'cita.id_doctor')
            ->join('especialidad', 'especialidad.id', '=', 'doctor.id_especialidad')
            ->select('paciente.dni', 'paciente.nombre_pac', 'paciente.apellido_pac',
            'doctor.nombre_doc', 'doctor.apellido_doc', 'especialidad.descripcion as especialidad', 'cita.id_cita',
            'cita.fecha_cita', 'cita.hora_cita', 'diagnostico.descripcion as diagnostico', 'diagnostico.created_at')
            ->get();
        return view('menu.resultado', [
            'diagnostico' => $diagnostico,
        ]);
    }
}
