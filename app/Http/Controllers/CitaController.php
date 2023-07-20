<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Paciente;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index(Cita $cita = null, int $http = 200)
    {
        $doctor = Doctor::join('especialidad', 'especialidad.id', '=', 'doctor.id_especialidad')
            ->select('doctor.*', 'especialidad.descripcion as especialidad')
            ->get();
        $paciente = Paciente::all();
        return view('menu.cita', [
            'cita' => $cita,
            'http' => $http,
            'doctor' => $doctor,
            'paciente' => $paciente,
        ]);
    }
    public function save(Request $request)
    {
        $cita = Cita::create([
            'dni' => $request['dni'],
            'id_doctor' => $request['id_doctor'],
            'fecha_cita' => $request['fecha_cita'],
            'hora_cita' => $request['hora_cita'],
        ]);
        return $this->index($cita);
    }
}
