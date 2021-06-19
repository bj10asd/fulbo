@extends('home')
@section('title','Crear cancha')

@section('content')
<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet"> 
<br><br>

<!-- <h1>{{$val->imagen == null}}</h1>  -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Editar cancha</div>
                    <div class="card-body">
                        <form method="POST" id="EditarCancha" name="EditarCancha" class="form-horizontal col-md-10" enctype="multipart/form-data" action="{{ route('administrarmicancha.store') }}">
                            <!-- ESTO PARA EL ID DE UNA CANCHA EN PARTICULAR -->
                            <input type="hidden" name="id_cancha" id="id_cancha" value="{{ $val->id }}"> 
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
                                        <textarea id="detail" name="detail" required="" class="form-control" >{{ $val->detalles_de_canchas }}</textarea>
                                    </div>
                            </div>
                            <div class="form-group row mb-0" >
                                <label class="col-sm-6 control-label" for="imagen">Foto 
                                    @if(($val->imagen == null)!=1)
                                        <img id="imagenN" name="imagenN" required="" width="300" height="200" src="/fulbo/storage/app/public/canchas/{{$val->imagen}}"> 
                                    @endif
                                        <input name="imagen" id="imagen" type="file" accept=".jpg, .jpeg, .png"> </label>
                                    
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