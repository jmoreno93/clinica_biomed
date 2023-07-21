<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../css/Estilo_Registrar_Paciente.css">
    <meta charset="utf-8">
    <title>Clinica Biomed</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Lexend:wght@200&family=Montserrat:wght@200&family=Nunito:wght@200;300&family=Staatliches&family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@300&family=Cinzel&family=Lexend:wght@200&family=Montserrat:wght@200&family=Nunito:wght@200;300&family=Staatliches&family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
</head>
<body>
<!-- Header -->
<nav id="header" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="Menu.html">
            <img src="img/logo.png" width="200px" height="100px" alt="#">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">¿Quiénes somos?<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/especialidad">Especialidades<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/doctor">Médicos<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Servicios <span class="sr-only">(current)</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/paciente">Pacientes</a>
                        <a class="dropdown-item" href="/diagnostico">Diagnóstico</a>
                        <a class="dropdown-item" href="/resultado">Resultado Pacientes</a>
                        <a class="dropdown-item" href="/cita">Separar Cita</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<button id="btnModal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="display: none;">
    Launch demo modal
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalBody" class="modal-body">

            </div>
            <div class="modal-footer">
                <button id="btnModalGuardar" type="button" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@yield('body')
<footer id="footer" class="pb-4 pt-4" style="background-color:lightgray;">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <a href="#">© 2020 CLINICA BIOMED | Todos los derechos reservados | Diseñado por Gusoft Technology</a>
            </div>
        </div>
    </div>
</footer>
<!-- /Footer -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    const zeroPad = (num, places) => String(num).padStart(places, '0')
    function modal(body, save = false)
    {
        $('#modalTitle').html('Mensaje del sistema');
        $('#modalBody').html(body);
        if(save == false)
        {
            $('#btnModalGuardar').css('display', 'none');
        }
        $('#btnModal').click();
    }
</script>
@yield('script')
</body>
</html>
