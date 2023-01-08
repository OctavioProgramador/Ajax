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
    sleep(1);
    $valores = json_encode($valores);
    echo $valores;
}

if(isset($_POST['guardar'])){
    $doc = $_POST['doc'];
    $nombre = $_POST['nombre'];
    $dir = $_POST['dir'];
    $tel = $_POST['tel'];
    $existe = "0";

    //CONSULTAR
    $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db1 WHERE doc = '$doc'");
    while ($consulta = mysqli_fetch_array($resultados)) {
        $existe = "1";
    }

    if ($existe == "1") {
        // actualizar

        $_UPDATE_SQL = "UPDATE $tabla_db1 Set 
        nombre='$nombre', 
        direccion='$dir',
        telefono='$tel'
      
        WHERE doc='$doc'";

        mysqli_query($conexion, $_UPDATE_SQL);
        echo "Dato actualizado";
    } else {
        // crear uno nuevo
        //INSERTAR
        mysqli_query($conexion, "INSERT INTO $tabla_db1 (doc,nombre,direccion,telefono) values ('$doc',$nombre','$dir','$tel')");
        echo "Propietario agregado";
    }

}
include("bd/cerrar_conexion.php");
