@extends('master.base')
@section('body')
    <div class="cont_form">
        <div class="cont_titulo" align="center">
            <h1 class="titulo">Doctores</h1>
        </div>
        <div style="padding: 20px">
            <table id="tblList" class="table">
                <thead>
                <tr>
                    <th>Doctor</th>
                    <th>Especialidad</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $value)
                    <tr>
                        <td>{{ $value->nombre_doc }} {{ $value->apellido_doc }}</td>
                        <td>{{ $value->especialidad }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
                <input class="btn btn-primary" type="submit" value="Guardar">
                <input class="btn btn-secondary" id="btnLimpiar" type="reset" value="Limpiar">
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
@endsection
@section('script')
    <script>
        let table = new DataTable('#tblList');
        $('#frmDoctor').submit(function (){
            var especialidad = $('#especialidad').val();
            if(especialidad == 'null')
            {
                modal('Debe seleccionar una especialidad')
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
                    let table = new DataTable('#tblList');
                    table.row.add({
                        0: data.data.nombre_doc + ' ' + data.data.apellido_doc,
                        1: data.data.especialidad,
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

