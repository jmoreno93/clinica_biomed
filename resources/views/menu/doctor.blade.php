@extends('master.base')
@section('body')
    <div class="cont_form">
        <div class="cont_titulo" align="center">
            <h1 class="titulo">REGISTRO DE DOCTOR</h1>
        </div>
        <div style="padding: 20px">
            <form id="frmPaciente" name="frmPaciente" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="nombre_doc">Nombre</label>
                            <input type="text" class="form-control" required name="nombre_doc" id="nombre_doc" placeholder="Coloque aquí su nombre">
                        </div>
                        <div class="col">
                            <label for="apellido_doc">Apellido</label>
                            <input type="text" class="form-control" required name="apellido_doc" id="apellido_doc" placeholder="Coloque aquí sus apellidos">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <select class="form-control" name="especialidad" id="especialidad">
                                    <option value="null" selected>Seleccione</option>
                                @foreach($especialidad as $value)
                                    <option value="{{ $value->id }}">{{ $value->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Guardar">
                <input type="reset" value="Limpiar">
            </form>
            @if($http == 200)
                @if(!is_null($doctor))
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
