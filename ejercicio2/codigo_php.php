<?php
include("abrir_conexion.php");

// TODO: optimizar code

echo '
<table class="table table-hover">
   <tr>
          <th scope="col">#</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">APELLIDO</th>
          <th scope="col">TELEFONO</th>
        </tr>
';

$accion = $_POST['boton'];

if ($accion == 4) {
  $mi_busqueda = $_POST['mi_busqueda'];
  //CONSULTAR
  $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db1 WHERE nombre LIKE '%$mi_busqueda%'");
  while ($consulta = mysqli_fetch_array($resultados)) {

    echo '
    <tr>
      <td>' . $consulta['id'] . '</td>
      <td>' . $consulta['nombre'] . '</td>
      <td>' . $consulta['apellido'] . '</td>
      <td>' . $consulta['telefono'] . '</td>
    </tr>
  ';
  }
} else {
  if ($accion == 1) {
    $tabla = $tabla_db1;
  } else if ($accion == 2) {
    $tabla = $tabla_db2;
  } else if ($accion == 3) {
    $tabla = $tabla_db3;
  }

  //CONSULTAR
  $resultados = mysqli_query($conexion, "SELECT * FROM $tabla");
  while ($consulta = mysqli_fetch_array($resultados)) {

    echo '
    <tr>
      <td>' . $consulta['id'] . '</td>
      <td>' . $consulta['nombre'] . '</td>
      <td>' . $consulta['apellido'] . '</td>
      <td>' . $consulta['telefono'] . '</td>
    </tr>
  ';
  }

  echo '</table>';
}


?>