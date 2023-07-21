@extends('master.base')
@section('body')
    <div class="cont_form">
        <div class="cont_titulo" align="center">
            <h1 class="titulo">REGISTRO DE CITA</h1>
        </div>
        <div style="padding: 20px">
            <form id="frmCita" name="frmCita" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="dni">Paciente</label>
                            <select class="form-control" name="dni" id="dni">
                                <option value="null" selected>Seleccione</option>
                                @foreach($paciente as $value)
                                    <option value="{{ $value->dni }}">DNI: {{ $value->dni }} - {{ $value->nombre_pac }} {{ $value->apellido_pac }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="fecha_cita">Fecha</label>
                            <input type="date" class="form-control" required name="fecha_cita" id="fecha_cita">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="hora_cita">Hora</label>
                            <input type="time" class="form-control" required name="hora_cita" id="hora_cita">
                        </div>
                        <div class="col">
                            <label for="id_doctor">Doctor</label>
                            <select class="form-control" name="id_doctor" id="id_doctor">
                                <option value="null" selected>Seleccione</option>
                                @foreach($doctor as $value)
                                    <option value="{{ $value->id_doctor }}"> {{ $value->nombre_doc }} {{ $value->apellido_doc }} - {{ $value->especialidad }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Guardar">
                <input type="reset" value="Limpiar">
            </form>
            @if($http == 200)
                @if(!is_null($cita))
                    <div class="alert alert-success" role="alert">
                        El registro fue creado
                    </div>
                @endif
            @else
                <div class="alert alert-danger" role="alert">
                    El registro ya existe
                </div>
            @endif
        </div>
    </div>
@endsection
