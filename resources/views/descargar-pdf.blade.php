<!DOCTYPE html>
<html>
<head>
    <title>Pdf - confirmacion</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet"> 
    <!-- bootstrap -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    
</head>
<body>
   
   
   
<div class="container">

    
    
    <div>
          <picture >
          <div class="p-2 bg-info">
          <img src="log.png" alt="imagen " width="120" height="120" align="left">
              </div>
          </picture>
    </div>  
    <div style="font-family: 'Indie Flower', cursive;">  
       <br><br>            
        <h1 align="center"> Confirmación de reserva</h1>
    </div>
    
    <br>
    
    <div >
      <br>
       <div class="flex-center position-ref full-height">
        <p>Esta es su  confirmación de reserva, deberá presentarlo en la cancha con el responsable a cargo. <br><br>
        • Se tendrá que presentar el día
        <?php
           
            
            setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
            echo iconv('ISO-8859-2', 'UTF-8', strftime("%A, %d de %B de %Y", strtotime($user[0]->start)));
            echo "<br>";
            echo "• A horas: ".substr($user[0]->start,-8);
            
        ?>
            
        <br>
        
        • En {{$user[0]->nombre_del_predio}}. <br>
        
        • Especificaciones: {{$user[0]->detalles_de_canchas}}
        
        </p>
        </div>
        
    </div>
           <br><br>     
    <center>
   <picture>
       <img src="logoDi.png" align="center" width="50" height="50">
   </picture>
   </center>
   
   <center>
   <p> 
     <a href="http://di.unsa.edu.ar/">Dpto. de Informática </a>-
     Facultad de Ciencias Exactas- Universidad Nacional de Salta <br>
     Trabajo realizado por el alumno Terrazas José. <br>
     <p>¡ Muchas gracias
          {{ Auth::user()->name }} !
     </p>
   </center>      
          
    <div class="p-2 bg-info"></div>
      
</div>
    
</body>
