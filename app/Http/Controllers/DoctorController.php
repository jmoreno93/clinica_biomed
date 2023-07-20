<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Doctor $doctor = null, int $http = 200)
    {
        $especialidad = Especialidad::all();
        return view('menu.doctor', [
            'doctor' => $doctor,
            'http' => $http,
            'especialidad' => $especialidad,
        ]);
    }
    public function save(Request $request)
    {
        $doctor = Doctor::create([
            'nombre_doc' => $request['nombre_doc'],
            'apellido_doc' => $request['apellido_doc'],
            'id_especialidad' => $request['especialidad'],
        ]);
        return $this->index($doctor);
    }
}
