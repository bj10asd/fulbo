@extends('home')
@section('title','Canchas')

@section('content')
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet"> 
    <br><br>
    <div class="container">
        <div style="font-family: 'Indie Flower', cursive;">
        <!--<div style="font-family: 'Press Start 2P', cursive;"> -->
            <h1 align="center">
                {{ $var }}
            </h1>
        </div>
        <table class="table table-bordered data-table1">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Detalle</th>
                    <th>User_id</th>
                    
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
                ajax:coso,
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'id', name: 'id', visible: false},
                    {data: 'nombre_del_predio', name: 'nombre_del_predio'},
                    {data: 'detalles_de_canchas', name: 'detalles_de_canchas'},
                    {data: 'user_id', name: 'user_id', visible: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                
            });
            
            $('body').on('click', '.editProduct', function () {
                var product_id = $(this).data('id');
                var newLink = "http://localhost:8080/fulbo/public/tasks/"+product_id;
                //alert(newLink);
                //location.href="tasks/"+product_id;
                
                location.href = newLink;
                    
                })
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