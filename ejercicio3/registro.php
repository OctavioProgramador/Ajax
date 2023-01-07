<html>

<head>
  <title>Programando Ando</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <div class="row">
      <!-- INICIA LA COLUMNA -->
      <div class="col-md-4 offset-md-4">
        <center>
          <h1>PROPIETARIO</h1>
        </center>

        <form>
          <!--Campo Documento-->
          <div class="mb-3">
            <label for="doc">Documento</label>
            <input type="text" name="doc" class="form-control" id="doc" onblur="buscar_datos();">
          </div>
          <!--Campo Nombre-->
          <div class="mb-3">
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" class="form-control" id="nombre">
          </div>
          <!--Campo Dirección-->
          <div class="mb-3">
            <label for="dir">Dirección </label>
            <input type="text" name="dir" class="form-control" id="dir">
          </div>
          <!--Campo Teléfono-->
          <div class="mb-3">
            <label for="tel">Teléfono </label>
            <input type="text" name="tel" class="form-control" id="tel">
          </div>
          <!--Botones-->
          <center>
            <input type="button" value="ENVIAR" class="btn btn-success" name="btn_enviar">
            <input type="button" value="CANCELAR" class="btn btn-danger" name="btn_cancelar">
          </center>
        </form>
      </div>
    </div>
  </div>
</body>

</html>

<script>
  function buscar_datos() {
    doc = $("#doc").val();

    var parametros = {
      "buscar": "1",
      "doc": doc
    };
    $.ajax({
      data: parametros,
      dataType: 'json',
      url: 'codigos_php.php',
      type: 'post',
      beforeSend: function() {
        alert("enviando");
      },
      error: function() {
        alert("Error");
      },
      complete: function() {
        alert("¡Listo!");
      },
      success: function(valores) {
      }
    })
  }
</script>

<?php
include("bd/abrir_conexion.php");

$doc    = "";
$nombre = "";
$dir    = "";
$tel    = "";

if (isset($_POST['btn_enviar'])) {
  echo "Presiono el boton Enviar";
}

if (isset($_POST['btn_cancelar'])) {
  echo "Presiono el boton Cancelar";
}

include("bd/cerrar_conexion.php");
?>