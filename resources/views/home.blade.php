@extends('master')

@section('title','Main')


@section('content')
   
   <!--info de jquery y carousel -->
    
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
   
    <br>
       <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Carta de bienvenida</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Bienvenido!
                    </div>
                </div>
            </div>
        </div>
      
      
       
    </div>
      
    
       <div class="slider">
          <br><br>
           @include('slider',array('slides'=>DB::table('slider')->orderBy('priority','asc')->get()))
           <br><br>
       </div>
       
      

    

@endsection