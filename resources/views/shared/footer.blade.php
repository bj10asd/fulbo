<footer>
       <!--
        <center>
         
           <picture>
            <img src="logoDi.png" align="center" width="50" height="50">
          </picture>
          
        </center>
        -->
        <center>
          <p> 
                <a href="http://di.unsa.edu.ar/">Dpto. de Informática </a>-
                Facultad de Ciencias Exactas- Universidad Nacional de Salta <br>
                Trabajo realizado por el alumno Terrazas José. <br>
                <p>Usted está navegando como 

                @if(Auth::guest())
                    Visita
                @else
                    {{ Auth::user()->getRole() }}
                @endif

                </p>
          
        </center>
</footer>