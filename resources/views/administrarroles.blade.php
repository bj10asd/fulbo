@extends('home')
@section('title','Administrador de roles')

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
    <div class="flex-center position-ref full-height">     
    </div>
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
           </div>
           <div class="modal-body">
            <form id="EditRolesForm" name="EditRolesForm" class="form-horizontal">
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name"value="" maxlength="50" required="" disabled="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Detalle</label>
                        <div class="col-sm-12">
                            <input id="detail" name="detail" required="" class="form-control" disabled="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Rol</label>
                        <div class="col-sm-12">
                            <input id="rname" name="rname" required="" class="form-control" disabled="true">
                        </div>
                    </div>
                    <input type="hidden" name="rol_id" id="rol_id">
                    <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Roles</label>
                        <div class="col-sm-12">
                           <select class="form-control" id='role_id'name='role_id'>
                                @foreach($roles['data'] as $roles)
                                      <option value='{{ $roles->id }}'>{{ $roles->name }}</option>
                                @endforeach
                            </select>
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
        <h1 align="center">Administrar Roles</h1>
    </div>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Nro</th>
                <th>id</th>
                <th>Usuarios</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Rol</th>
                <th>Acción</th>
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
                {data: 'id', name: 'id', visible: false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'rname', name: 'rname'},
                {data: 'role_id', name: 'role_id', visible: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        }); 
        $('body').on('click', '.editProduct', function () {
            var id = $(this).data('id');
            $.get("{{ route('administrarroles.index')}}" + '/' + id + '/edit', function(data){
                $('#modelHeading').html("Editar Roles");
                $('#product_id').val(data.adm.id);
                $('#name').val(data.adm.name);
                $('#detail').val(data.adm.email);
                $('#rname').val(data.role[0].name);
                $('#rol_id').val(data.role[0].role_id);
                $('#role_id').val(data.role[0].name);
                $('#ajaxModel').modal('show');
            })     
        });
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
            $.ajax({
                data: $('#EditRolesForm').serialize(),
                url: "{{ route('administrarroles.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#EditRolesForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },            
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });
        $('body').on('click', '.deleteProduct', function () {
            var product_id = $(this).data("id");
            //alert(rol_id);
            bootbox.confirm({
            message: "Seguro desea eliminar este usuario?",
            buttons: {
                confirm: {
                    label: 'SI',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result){
                if(result){
                    $.ajax({
                        type: "delete",                
                        url: location.href="http://localhost:8080/fulbo/public/administrarroles/"+product_id,
                        success: function (data) {
                        location.href="http://localhost:8080/fulbo/public/administrarroles";
                        table.draw();
                    },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                };
            }
        });
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

@endsection