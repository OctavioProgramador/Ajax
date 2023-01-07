<!DOCTYPE html>
<html>
<head>
	<title>Probando</title>
	<script src="jquery-3.4.1.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
  <h1 class="text-center">PLATAFORMA DE CONTROL</h1>
  <hr>
  <div class="row text-center">
    <div class="col"><input type="button" class="btn btn-primary" value="CLIENTES" onclick="saludame(1);"></div>
    <div class="col">
      <input type="button" class="btn btn-primary" value="EMPLEADOS" onclick="saludame(2);"><br><br>

      <input type="text" class="form-control" id="cuadro_buscar" onkeypress="mi_busqueda();">
    </div>
    <div class="col"><input type="button" class="btn btn-primary" value="ADMINISTRADORES" onclick="saludame(3);"></div>
  </div>
  <hr>
  <h2 class="text-center">LISTAS DETALLADAS</h2>
  <div class="row justify-content-md-center">
    <div class="col-md-8">
      <div id="mostrar_mensaje"></div>
    </div>
  </div>
</div>



<script>
	function saludame(boton)
    { 
      var parametros = 
      {
        "boton" : boton,
        "nombre" : "dostin",
        "apellido" : "hurtado",
        "telefono" : "123456789"
      };

      $.ajax({
        data: parametros,
        url: 'codigo_php.php',
        type: 'POST',
        
        beforesend: function()
        {
          $('#mostrar_mensaje').html("Mensaje antes de Enviar");
        },

        success: function(mensaje)
        {
          $('#mostrar_mensaje').html(mensaje);
        }
      });
    }
    function mi_busqueda()
    { 
      buscar = document.getElementById('cuadro_buscar').value;
      var parametros = 
      {
        'mi_busqueda' : buscar,
        'boton' : "4"
      };

      $.ajax({
        data: parametros,
        url: 'codigo_php.php',
        type: 'POST',
        
        beforesend: function()
        {
          $('#mostrar_mensaje').html("Mensaje antes de Enviar");
        },

        success: function(mensaje)
        {
          $('#mostrar_mensaje').html(mensaje);
        }
      });
    }


</script>
</body>
</html>