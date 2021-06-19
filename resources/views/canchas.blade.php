@extends('home')
@section('title','Canchas')

@section('content')
      
      <!-- Font -->
   <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet"> 
    
      

 
      
      
       <br><br>
        <div class="flex-center position-ref full-height">
            
        </div>
        
<div class="container">
    
    
     <div style="font-family: 'Indie Flower', cursive;">
         <h1 align="center">Nuestras canchas</h1>
     </div>
     
      <table class="table table-bordered data-table">
          <thead>
                <tr>
                  <th>Nro</th>
                  <th>Nombre</th>
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
                ajax: "{{ route('canchas.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
            
            
            $('body').on('click', '.editProduct', function () {
                //alert("ejecutando esto");
                var product_id = $(this).data('id');
                location.href="http://localhost:8080/fulbo/public/canchasporid/"+product_id
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