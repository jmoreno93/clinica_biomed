@extends('master.base')
@section('body')
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
                            <input type="date" class="form-control" required name="fecha_nac" id="fecha_nac">
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
                <input type="reset" value="Limpiar">
            </form>
            @if($http == 200)
                @if(!is_null($paciente))
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
