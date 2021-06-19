@extends('home')
@section('title','Crear cancha')

@section('content')

<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet"> 
<br><br>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Agregar cancha</div>
                    <div class="card-body">
                        <form method="POST" id="NuevaCancha" name="NuevaCancha" class="form-horizontal col-md-10" enctype="multipart/form-data" action="{{ route('administrarmicancha.store') }}">
                            <!-- NECESITO PASAR EL ID DE LA CANCHA, NO DE UNA CANCHA EN PARTICULAR -->
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{Auth::id()}}">
                            <div class="form-group row" >
                                <label class="col-sm-6 control-label">Nombre</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nombre_del_predio" name="nombre_del_predio" maxlength="50" required="" disabled="true" value="{{Auth::user()->name}}"></input>
                                    </div>
                            </div>
                            <input  type="hidden" name="name" id="name" value="{{Auth::user()->name}}">
                            <div class="form-group row" >
                                <label class="col-sm-6 control-label">Detalles de cancha</label>
                                    <div class="col-sm-12">
                                        <textarea id="detail" name="detail" required="" class="form-control" placeholder="Cancha #X, FX, cesped tanto..."></textarea>
                                    </div>
                            </div>
                            <div class="form-group row mb-0" >
                                <label class="col-sm-6 control-label" for="imagen">Foto <input name="imagen" id="imagen" type="file" accept=".jpg, .jpeg, .png"> </label>
                                <div class="col-md-8 col-sm-10 " >
                                    <button  class="btn btn-primary" id="saveBtn"value="create">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   


@endsection