<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Especialidad;
use App\Models\Paciente;
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
}
