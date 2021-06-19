@extends('home')
@section('title','Canchas')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    
    <!-- Script para modal -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.3.2/bootbox.js" integrity="sha256-/xtAmLBY+m2arbG5tgC75nJ3pC0zGLdo0hw8zEOuVF4=" crossorigin="anonymous"> </script>
    
    <!-- fullcalendar? -->
            
        
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <!-- semana en calendar -->
    
      <style>

    html, body {
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }

    #calendar {
      max-width: 900px;
      margin: 40px auto;
    }

  </style>
    
    
    <link href='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.css' rel='stylesheet' />

    <script src='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/interaction@4.3.0/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.js'></script>
    <!-- Fonts -->
    
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet"> 
    
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet"> 
    
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet"> 
    
    
    <!-- -->
       <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    
<!-- Cuerpo de la pagina -->

  <br><br>
  <!--<div style="font-family: 'Dancing Script', cursive;">--> 
  <div style="font-family: 'Indie Flower', cursive;">
  <!--<div style="font-family: 'Press Start 2P', cursive;"> -->

  <h3 align="center">
  @if(isset($nom) && isset($det))
  {{ $nom .", ". $det }}
  @else
      Canchas
@endif
  </h3>
  </div>
  <br>
  <div class="container">
      <div class="row justify-content-center">
          <div id='calendar' class="col-md-10 col-sm-10 col-lg-10" ></div>
      </div>
  </div>
  <hr>


    <!-- Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alquilar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <form id="productForm" name="productForm" class="form-horizontal">
           {{ csrf_field() }}
           <div class="form-group">
           <label for="start" class=" control-label">Dia y Hora de inicio:</label>
            
              <div class="col-sm-12">
               <input type="text" id="start" disabled> 
               </div>
            </div>
            <div class="form-group">
            <label for="start" class=" control-label">
                Dia y Hora de fin: </label>
            <div class="col-sm-12">
                <input type="text" name="end" id="end" disabled>
            </div>
               </div>
            
            <input type="text" id="id_cancha" hidden>
            <input type="text" id="title" hidden>
            <input type="text" id="info" hidden>
            <br>
            
          
          <div class="row col-12 col-lg-12 col-sm-12 col-md-12">
            <div class="col-6 col-lg-6 col-sm-6 col-md-6"></div>           
            <div class="col-2 col-lg-2 col-sm-2 col-md-2">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button></div>
            <div class="col-4 col-lg-4 col-sm-4 col-md-4">
            <button type="button" id="saveBtn" class="btn btn-primary" >Save changes</button>
            </div>
             </div>
              </form>
            </div>
          
        </div>
      </div>
    </div>
    <div align="center" width="500" height="300">
    <img width="500" height="300" src="/fulbo/storage/app/public/canchas/{{$imagen}}" alt="">
    </div>
<script>
    
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
    });
     document.addEventListener('DOMContentLoaded', function() {
         var calendarEl = document.getElementById('calendar');
         var calendar = new FullCalendar.Calendar(calendarEl, {
             locale: 'es',
             defaultView: 'agendaDay',
             plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
             @if(Auth::user())
             @if(Auth::user()->hasRole('cliente'))
             selectable: true,
             @else
             selectable :false,
             @endif
             @endif
             defaultView: 'timeGridWeek',
             defaultTimedEventDuration: '01:00:00',
             allDaySlot:false,
             minTime: "08:00:00",
             maxTime: "23:59:00",
             contentHeight:'auto',       //auto
             slotDuration: '00:60:00',
             header: {
             left: 'prev,next today',
             center: 'title',
             right: 'timeGridWeek,timeGridDay'
             },
             @if(isset($tasks))
             events: [
                @foreach($tasks as $task) {
                    title : '{{ $task->title }}',
                    start : '{{ $task->start }}',
                    end : '{{ $task->end }}',
                         
                },
                @endforeach
             ],
                @endif
           @if(Auth::user())
           
             select: function(info) {
                 
                var str = calendar.formatDate(info.startStr, {
                  month: 'long',
                  year: 'numeric',
                  day: 'numeric'
                });
                 
                $("#Modal").modal("show");
                var fechini=info.startStr.substring(0,10);
                 
                    $("#title").val('{{Auth::user()->name}}');
                 
                var hs =info.start.getHours();
                 var start=fechini + " " +hs+":00:00";
                $("#start").val(start);
                 var fin= fechini + " " +(hs+1)+":00:00";
                $("#end").val(fin);
                 
                $("#id_cancha").val('{{$id}}');
                $("#info").val(str);
            }
            
          @endif
         });
         calendar.render();
         
         
     });
          @if(Auth::user())
    $('#saveBtn').click(function (e) {
          e.preventDefault();
          $.ajax({
             data: { title:document.getElementById("title").value,start: document.getElementById("start").value,end:document.getElementById("end").value,id_cancha:document.getElementById("id_cancha").value,info:document.getElementById("info").value},
             url: "{{ route('tasks.store') }}",
             type: "POST",
             dataType: 'JSON',
             success: function (data) {
                 $.ajax({
                 url: "{{ route('productos.pdf') }}",
                     success: function (data) {
                         if(data.success)
                                $("#Modal").modal('hide')
                                
                                alert("Se ha enviado un email con la reserva al destino: "+"{{Auth::user()->email}}");
                                location.href=window.location;
                             
                     },
                     error: function (data) {
                     }
                 });
             },
             error: function (data) {
                  console.log('Error:', data);
                  $('#saveBtn').html('Save Changes');
                    }
                });
            });
         @endif
</script>
@endsection