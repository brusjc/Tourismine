<html>
<head>
    <title>Formulario con Combobox</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">




<script src="{{ asset('js/app.js') }}"></script> 


</head>
<body>
 

<div class="container col-md-4 col-md-offset-4">
    <div class="btn-group" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <label for="estado6_id" class="control-label">Seleccione Estado</label>
            <select name="estado_id" id="estado_id" class="form-control">
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
        <label for="provincia_id" class="control-label">Seleccione Provincia</label>
        <select name="provincia_id" id="provincia_id" class="form-control">
            <option value="">Seleccione Estado</option>
        </select>
    </div>
</div>

<br/><br/><br/>

<div class="col-lg-4 col-md-4">
  <a class="mb-2 btn btn-block btn-info" href="provinciasXEstado/28">España</a>
</div>

<script>
  $(document).ready(function()
  {
    $("#estado_id").change(function()
    {
      //alert("estamos en la funcion");
      var estado = $(this).val();
      //alert(estado);
      $.get('provinciasXEstado/'+estado, function(json)
      {
        console.log(json);
        var provincia_select = '<option value=""> Seleccione Provincia </option>'

        for (var clave in json)
        {
          if (json.hasOwnProperty(clave)) 
          {
            //alert(clave);
            //alert("La clave es " + clave + " y el valor es " + json[clave]);

            if(clave=="data")
            {
              //alert("Estamos en la clave: " + clave);

              var data = json[clave];
              //alert(data.length);

              for (var i=0; i<data.length; i++)
              {
                //alert("El valor del data es: " + data[i].nombre);
                
                //alert("La clave es " + data + " y el valor es " + data[i]);
                  //alert(data[i].nombre);
                  provincia_select+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
              }
            }
          }
        }
        $("#provincia_id").html(provincia_select);
      });
    });
  });
</script>

</body>
</html>