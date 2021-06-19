@extends('home')
@section('title','Reportes')

@section('content')
<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.3.2/bootbox.js" integrity="sha256-/xtAmLBY+m2arbG5tgC75nJ3pC0zGLdo0hw8zEOuVF4=" crossorigin="anonymous"> </script>


          <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet"> 
    <br><br>
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
           </div>
           <div class="modal-body">
            <form id="EditRolesForm" name="EditRolesForm" class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="title" name="title"value="" maxlength="50" required="" disabled="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">dia</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="start" name="start"value="" maxlength="50" required="" disabled="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">fin</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="end" name="end"value="" maxlength="50" required="" disabled="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Detalle</label>
                        <div class="col-sm-12">
                            <input id="detalle_de_cancha" name="detalle_de_cancha" required="" class="form-control" disabled="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre del predio</label>
                        <div class="col-sm-12">
                            <input id="nombre_del_predio" name="nombre_del_predio" required="" class="form-control" disabled="true">
                        </div>
                    </div>
                    <input type="hidden" name="rol_id" id="rol_id">
                    <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Roles</label>
                        <div class="col-sm-12">
                           <input type="text">
                        </div>
                    </div>       
                    <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" class="btn btn-primary" id="saveBtn"value="create">Guardar</button>
                    </div>
               </form>   
            </div>
          </div>
        </div>
    </div> 
     
<div class="container">
    <div style="font-family: 'Indie Flower', cursive;">
        <h1 align="center">Reportes</h1>
    </div>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Cliente</th>
                <th>comienzo</th>
                <th>fin</th>
                <th>predio</th>
                <th>detalles</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });     
        var table = $('.data-table').DataTable({
            language: spanish,
            processing: true,
            serverSide: true,
            ajax: window.location,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {data: 'start', name: 'start'},
                {data: 'end', name: 'end'},
                {data: 'nombre_del_predio', name: 'nombre_del_predio'},
                {data: 'detalles_de_canchas', name: 'detalles_de_canchas'},
            ],
        }); 
        
        
    });
    var spanish =
            {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending":   ":   Activar   para   ordenar   la   columna   de   maneradescendente"
                }
            };
      

</script>
<div class="container">
    <a class="btn btn-success" id="createNewRepo" href="{{ route('crearreporte.pdf') }}">Descargar reporte</a>
</div>
@endsection