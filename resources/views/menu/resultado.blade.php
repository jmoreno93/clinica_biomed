@extends('master.base')
@section('body')
    <div class="cont_form">
        <div class="cont_titulo" align="center">
            <h1 class="titulo">REGISTRO DE PACIENTE</h1>
        </div>
        <div style="padding: 20px">
            <table class="table">
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
    <script>
        $('#frmPaciente').submit(function (){
            var formData = {
                _token: "{{ csrf_token() }}",
                dni: $('#dni').val(),
                nombre_pac: $('#nombre_pac').val(),
                apellido_pac: $('#apellido_pac').val(),
                sexo: $("input[name='sexo']").val(),
                direccion: $('#direccion').val(),
                telefono: $('#telefono').val(),
                fecha_nac: $('#fecha_nac').val(),
            };
            $.ajax({
                type: "POST",
                url: '/paciente',
                data: formData,
                success: function(data)
                {
                    alert(data);
                },
            });
            return false;
        });

    </script>
@endsection
