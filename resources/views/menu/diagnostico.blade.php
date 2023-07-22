@extends('master.base')
@section('body')
    <div class="cont_form">
        <div class="cont_titulo" align="center">
            <h1 class="titulo">DIAGNÓSTICO</h1>
        </div>
        <div style="padding: 20px">
            <form id="frmDiagnostico" name="frmDiagnostico" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="id_cita">Cita</label>
                            <select class="form-control" name="id_cita" id="id_cita">
                                <option value="null" selected>Seleccione</option>
                                @foreach($cita as $value)
                                    <option value="{{ $value->id_cita }}">Cita: {{ str_pad($value->id_cita, 5, '0', STR_PAD_LEFT) }} - {{ $value->nombre_pac }} {{ $value->apellido_pac }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Guardar">
                <input id="btnLimpiar" type="reset" value="Limpiar">
            </form>
            @if($http == 200)
                @if(!is_null($diagnostico))
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
        $('#frmDiagnostico').submit(function (){
            var cita = $('#id_cita').val();
            if(cita == 'null')
            {
                modal('Debe seleccionar una cita');
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
