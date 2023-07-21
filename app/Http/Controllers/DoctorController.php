<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Especialidad;
use Illuminate\Http\Request;
use App\Http\Responses\Responser;

class DoctorController extends Controller
{
    use Responser;
    public function index(Doctor $doctor = null, int $http = 200)
    {
        $list = Doctor::join('especialidad', 'especialidad.id', '=', 'doctor.id_especialidad')
            ->select('doctor.nombre_doc', 'doctor.apellido_doc', 'especialidad.descripcion as especialidad')
            ->orderBy('doctor.id_doctor')
            ->get();
        $especialidad = Especialidad::all();
        return view('menu.doctor', [
            'list' => $list,
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
        $especialidad = Especialidad::find($doctor['id_especialidad']);
        $doctor['especialidad'] = $especialidad['descripcion'];
        return $this->successResponse($doctor);
    }
}
