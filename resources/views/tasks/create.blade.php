<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>


<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>


<form action="{{ route('tasks.store') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" id="id" name="id"/>
    Nombre:
    <br/>
    <input type="text" name="name" />
    <br/><br/>
    Descripcion: 
    <br/>  
    <textarea name="description"></textarea>  
    <br/><br/>  
    Fecha:  
    <br/>  
    <input type="text" name="task_date" class="date" />  
    <br/><br/>  
    <input class="btn btn-primary" type="submit" value="Guardar" />
</form>


