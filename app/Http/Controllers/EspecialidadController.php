<?php

namespace App\Http\Controllers;

use App\Http\Responses\Responser;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    use Responser;
    public function index(Especialidad $especialidad = null, int $http = 200)
    {
        $list = Especialidad::all();
        return view('menu.especialidad', [
            'list' => $list,
            'especialidad' => $especialidad,
            'http' => $http,
        ]);
    }
    public function save(Request $request)
    {
        $especialidad = Especialidad::create([
            'descripcion' => $request['descripcion'],
        ]);
        return $this->successResponse($especialidad);
    }
}
