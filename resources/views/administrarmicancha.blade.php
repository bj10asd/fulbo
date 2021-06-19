@extends('home')
@section('title','Administrar mi cancha')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.3.2/bootbox.js" integrity="sha256-/xtAmLBY+m2arbG5tgC75nJ3pC0zGLdo0hw8zEOuVF4=" crossorigin="anonymous"> </script>

<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet"> 
<br><br>

<!-- FORM PARA EDITAR CANCHA -->
<div class="flex-center position-ref full-height">
    <div class="modal fade" id="ajaxModel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading1"></h4>
                </div>
                <div class="modal-body">
                    <form id="edit" name="edit" class="form-horizontal" enctype="multipart/form-data" href="{{ route('amc.act',Auth::id()) }}">
                        <!-- ESTO PARA EL ID DE UNA CANCHA EN PARTICULAR -->
                        <input type="hidden" name="id_cancha" id="id_cancha"> </input>

                        <!-- NECESITO PASAR EL ID DE LA CANCHA, NO DE UNA CANCHA EN PARTICULAR -->
                        <input type="hidden" name="id1" id="id1" ></input>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="nombre">Nombre</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nombre" name="nombre" maxlength="50" required=""  disabled="true"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Detalles</label>
                            <div class="col-sm-12">
                                    <input type="text" class="form-control" id="detalles" name="detalles" maxlength="50" required="" disabled="true"></input>
                                </div>
                        </div>
                        <div class="form-group" width="300" height="200" align="center" enctype="multipart/form-data">
                            <label class="col-sm-2 control-label">Foto</label>
                                <div class="col-sm-12" width="300" height="200" >
                                    <img id="imagen" name="imagen" required="" width="300" height="200" >
                                    <p id="p" name="p" style="display:none"> NO FOTO </p>
                                </div>
                        </div>
                        <div class="form-group col-sm-12" enctype="multipart/form-data">
                        <a class="btn btn-primary" href="javascript:void(0)" id="editt" >Editar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div style="font-family: 'Indie Flower', cursive;">
        <!--<div style="font-family: 'Press Start 2P', cursive;"> -->
        <!-- TITULO DEL DATA TABLE -->
        
        <h1 align="center"> {{ Auth::user()->name }}  </h1>
    </div>
    <a class="btn"  id="createNewProduct" href="{{ route('amc.create',Auth::id()) }}">Añadir cancha</a>
    <br><br>
    <table class="table table-bordered data-table1">
        <thead>
            <tr>
                <th>Nro</th>
                <th>id</th>
                <th>Nombre</th>
                <th>Detalle</th>
                <th>User_id</th>
                <th>imagen</th>
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
        var coso = window.location;
        var table = $('.data-table1').DataTable({
            language: spanish,
            processing: true,
            serverSide: true,
            enctype: "multipart/form-data",
            ajax:coso,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'id', name: 'id', visible: false},
                {data: 'nombre_del_predio', name: 'nombre_del_predio'},
                {data: 'detalles_de_canchas', name: 'detalles_de_canchas'},
                {data: 'user_id', name: 'user_id', visible: false},
                {data: 'imagen', name: 'imagen', visible: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });
        $('body').on('click', '.editProduct', function () {
            var id = $(this).data('id');
            //alert(id);
            $.get("{{ route('administrarmicancha.index')}}" + '/' + id + '/edit', function(data){
                $('#edit').trigger("reset");
                $('#ajaxModel1').modal('show');
                $('#id_cancha').val(data.adm.id);
                $('#id1').val(data.adm.user_id);
                $('#nombre').val(data.adm.nombre_del_predio);
                $('#detalles').val(data.adm.detalles_de_canchas);
                if(data.adm.imagen != null){
                    document.getElementById('imagen').style.display = 'inline';
                    document.getElementById('p').style.display = 'none';
                    $('#imagen').attr("src", "/fulbo/storage/app/public/canchas/"+data.adm.imagen);
                }
                else{
                    document.getElementById('imagen').style.display = 'none';
                    document.getElementById('p').style.display = 'inline';
                }
                
                $('#modelHeading1').html("Vista previa");
                
            })
        });
        $('#editt').click(function (e) {
            var id = document.getElementById("id_cancha").value;
            location.href=`{{ route('administrarmicancha.index')}}`+'/amc/act/'+id;
            //alert(id);
            
            
        });
        
        $('body').on('click', '.deleteProduct', function () {
            var id = $(this).data("id");
            bootbox.confirm({
                message: "¿Seguro desea eliminar esta cancha?",
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
                            url: "{{ route('admc.destroy') }}"+'/'+id,
                            success: function (data) {
                            
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