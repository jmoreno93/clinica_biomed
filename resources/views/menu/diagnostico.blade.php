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
                                    <option value="{{ $value->id }}">Cita: {{ str_pad($value->id_cita, 5, '0', STR_PAD_LEFT) }} - {{ $value->nombre_pac }} {{ $value->apellido_pac }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
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
