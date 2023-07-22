@extends('master.base')
@section('body')
    <div class="cont_form">
        <div class="cont_titulo" align="center">
            <h1 class="titulo">ESPECIALIDADES</h1>
        </div>
        <div style="padding: 20px">
            <table id="tblList" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Especialidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $value)
                    <tr>
                        <td>{{ str_pad($value->id, 5, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $value->descripcion }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="cont_form">
        <div class="cont_titulo" align="center">
            <h1 class="titulo">REGISTRO DE ESPECIALIDADES</h1>
        </div>
        <div style="padding: 20px">
            <form id="frmEspecialidad" name="frmEspecialidad" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" required name="descripcion" id="descripcion" placeholder="Coloque aquí una especialidad" />
                        </div>
                    </div>
                </div>
                <input class="btn btn-primary" type="submit" value="Guardar">
                <input class="btn btn-secondary" id="btnLimpiar" type="reset" value="Limpiar">
            </form>
            @if($http == 200)
                @if(!is_null($especialidad))
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
        $('#frmEspecialidad').submit(function (){
            var formData = {
                _token: "{{ csrf_token() }}",
                descripcion: $('#descripcion').val(),
            };
            $.ajax({
                type: "POST",
                url: '/especialidad',
                data: formData,
                success: function(data)
                {
                    let table = new DataTable('#tblList');
                    table.row.add({
                        0: zeroPad(data.data.id, 5),
                        1: data.data.descripcion,
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
