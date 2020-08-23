<html>
<head>
    <title>Formulario con Combobox</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
 
<div class="container col-md-4 col-md-offset-4">
    <div class="btn-group" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <select name="estados" id="estados" class="form-control">
                <option value="">Seleccione</option>
                @foreach($estados as $estado)
                    <option value="{{$estado['id']}}">{{$estado['nombre']}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<br/><br/><br/> <br/><br/><br/>

<div class="container col-md-4 col-md-offset-4">
    <div class="btn-group" role="group" aria-label="...">
        <label for="" class="control-label">Seleccione Provincia</label>
        <select name="provincias" id="provincias" class="form-control">
            <option value="">Seleccione Estado</option>
        </select>
    </div>
</div>

<br/><br/><br/>

<div class="col-lg-4 col-md-4">
          <a class="mb-2 btn btn-block btn-info" href="provinciasXEstado/28">España</a>
        </div>


<script>
  $(document).ready(function(){
    $("#estados").change(function(){
      var estado = $(this).val();
      $.get('provinciasXEstado/'+estado, function(datos){
//esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
//alert(datos.data[1].id);
        console.log(datos);
        var midata = misdatos;
alert(midata);
        var provincia_select = '<option value="">Seleccione Provincia</option>';
            $.each(midata, function(i,item){
//            for (var i=0; i<datos.length;i++)
              provincia_select+='<option value="'+midata[i].id+'">'+midata[i].nombre+'</option>';
            }


        $("#provincias").html(provincia_select);

      });
    });
  });
</script>

</body>
</html>