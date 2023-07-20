@extends('master.base')
@section('body')
    <div class="cont_form">
        <div class="cont_titulo" align="center">
            <h1 class="titulo">REGISTRO DE DOCTOR</h1>
        </div>
        <div style="padding: 20px">
            <form id="frmDoctor" name="frmDoctor" method="POST">
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
        $('#frmDoctor').submit(function (){
            var especialidad = $('#especialidad').val();
            if(especialidad == null)
            {
                return false;
            }
            var formData = {
                _token: "{{ csrf_token() }}",
                nombre_doc: $('#nombre_doc').val(),
                apellido_doc: $('#apellido_doc').val(),
                especialidad: especialidad,
            };
            $.ajax({
                type: "POST",
                url: '/doctor',
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
