<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "dd-mm-yy"
    });
</script>


<form action="{{ route('tasks.store')}}" method="post">
  {{ csrf_field() }}
  <input type="hidden" id="id" name="id" value="{{$task->id}}"/>
  Nombre:  
  <br />
  <input type="text" id="name" name="name" value="{{$task->name}}"/>  
  <br /><br />  
  Descripcion:  
  <br />  
  <textarea id="description" name="description">{{$task->description}}</textarea>  
  <br /><br />  
  Fecha:  
  <br />  
  <input type="text" id="task_date" name="task_date" class="date" value="{{$task->task_date}}"/>  
  <br /><br />  
  <input type="submit" class="btn btn-primary" value="Guardar"/>
  </form>
  
 <form action="/tasks/{{ $task->id }}" method="post">
   {{ csrf_field() }}  
   {{ method_field('delete') }}  
   <button type="submit" class="btn btn-danger">Eliminar</button>
</form>