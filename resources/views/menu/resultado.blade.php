@extends('master.base')
@section('body')
    <div class="cont_form">
        <div class="cont_titulo" align="center">
            <h1 class="titulo">REGISTRO DE PACIENTE</h1>
        </div>
        <div style="padding: 20px">
            <table id="tblList" class="table">
                <thead>
                <tr>
                    <th>Cita</th>
                    <th>Paciente</th>
                    <th>Doctor</th>
                    <th>Descripción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($diagnostico as $value)
                    <tr>
                        <td>{{ str_pad($value->id_cita, 5, '0', STR_PAD_LEFT) }}</td>
                        <td>DNI: {{ $value->dni }} - {{ $value->nombre_pac }} {{ $value->apellido_pac }}</td>
                        <td>{{ $value->nombre_doc }} {{ $value->apellido_doc }} - {{ $value->especialidad }}</td>
                        <td>{{ $value->diagnostico }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var table = $('#tblList').DataTable();
    </script>
@endsection
