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
</head>
<body>
   
   
   
<div class="container">
    <br>
    <table class="table table-bordered data-table">
          <thead>
                <tr>
                  <th>Nro</th>
                  <th>Nombre</th>
                  <th>Detalle</th>
                </tr>
          </thead>
    </table>



    <div class="row col-12">
        <div class="col-10 col-md-10 col-sm-10 col-lg-10">
               <br><br>
                <h1 align="center">Confirmación de reserva</h1>
        </div>                    

       <div class="col-2 col-sm-2 col-md-2 col-lg-2">
            <img src="log.png" alt="imagen " width="150" height="150">
        </div>
    </div>
    
    <div class="row col-12 col-md-12 col-sm-12 col-lg-12" align="center">
       <div class="flex-center position-ref full-height">
        <p align="center">Este es su  confirmación de reserva, deberá presentarlo en la cancha con el responsable a cargo. <br>
        Se tendrá que presentar el día 
        
        </p><br>
        </div>
        
    </div>
                
          
          
          
      
</div>
    
</body>
<footer>
   <br><br><br><br>
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
          {{ Auth::user()->name }} 
     </p>
   </center>
</footer>