@extends('master.base')
@section('body')
    <div class="cont_form">
        <div class="cont_titulo" align="center">
            <h1 class="titulo">Pacientes</h1>
        </div>
        <div style="padding: 20px">
            <table id="tblList" class="table">
                <thead>
                <tr>
                    <th>DNI</th>
                    <th>Paciente</th>
                    <th>Fecha de nacimiento</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $value)
                    <tr>
                        <td>{{ $value->dni }}</td>
                        <td>{{ $value->nombre_pac }} {{ $value->apellido_pac }}</td>
                        <td>{{ date_format(date_create($value->fecha_nac), 'd/m/Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="cont_form">
        <div class="cont_titulo" align="center">
            <h1 class="titulo">REGISTRO DE PACIENTE</h1>
        </div>
        <div style="padding: 20px">
            <form id="frmPaciente" name="frmPaciente" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="nombre_pac">Nombre</label>
                            <input type="text" class="form-control" required name="nombre_pac" id="nombre_pac" placeholder="Coloque aquí su nombre">
                        </div>
                        <div class="col">
                            <label for="apellido_pac">Apellido</label>
                            <input type="text" class="form-control" required name="apellido_pac" id="apellido_pac" placeholder="Coloque aquí sus apellidos">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="dni">DNI</label>
                            <input type="text" class="form-control" maxlength="8" minlength="8" required name="dni" id="dni" placeholder="Coloque aquí su DNI">
                        </div>
                        <div class="col">
                            <label for="fecha_nac">Fecha de Nacimiento</label>
                            <input type="date" data-date-format="DD/MM/YYYY" class="form-control" required name="fecha_nac" id="fecha_nac">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Sexo</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo_femenino" value="F" required>
                                <label class="form-check-label" for="sexo_femenino">
                                    F
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo_masculino" value="M" required>
                                <label class="form-check-label" for="sexo_masculino">
                                    M
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <label for="direccion">Dirección</label>
                            <input type="text" maxlength="60" class="form-control" required name="direccion" id="direccion" placeholder="Coloque aquí su dirección">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="telefono">Teléfono</label>
                            <input type="text" maxlength="9" minlength="9" class="form-control" required name="telefono" id="telefono" placeholder="Coloque aquí su número de teléfono">
                        </div>
                    </div>
                </div>
                <input type="submit" value="Guardar">
                <input id="btnLimpiar" type="reset" value="Limpiar">
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let table = new DataTable('#tblList');
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
                    let table = new DataTable('#tblList');
                    table.row.add({
                        0: data.data.dni,
                        1: data.data.nombre_pac + ' ' + data.data.apellido_pac,
                        2: data.data.fecha_nac,
                    }).draw();
                    modal('Se ha registrado correctamente');
                    $('#btnLimpiar').click();
                },
                error: function(data)
                {
                    modal(data.responseJSON.message);
                },
            });
            return false;
        });
    </script>
@endsection
