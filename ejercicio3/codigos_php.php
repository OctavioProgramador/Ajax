<?php
include("bd/abrir_conexion.php");
	 
if(isset($_POST['buscar']))	{
    $doc = $_POST['doc'];
    $valores = array();
    $valores['existe'] = "0";
    //CONSULTAR
    $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db1 WHERE doc = '$doc'");
    while ($consulta = mysqli_fetch_array($resultados)) {
        $valores['existe'] = "1";
        $valores['nombre'] = $consulta['nombre'];
        $valores['direccion'] = $consulta['direccion'];
        $valores['telefono'] = $consulta['telefono'];
    }
    $mi_variable = json_encode($mi_variable);
    echo $mi_variable;
}
include("bd/cerrar_conexion.php");
