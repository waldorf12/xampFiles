<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "sr1920la";
$db_name = "Vehiculos";
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$IdMovAutos = $_POST["IdMovAutos"];
$IdAuto = $_POST["IdAuto"];
$IdChofer = $_POST["IdChofer"];
$FechaInicial = $_POST["FechaInicial"];
$FechaFinal = $_POST["FechaFinal"];
$Destino = $_POST["Destino"];
$IdResponsable = $_POST["IdResponsable"];


$sql = 'INSERT INTO MovcAutos (IdAuto,IdChofer,FechaInicial,FechaFinal,Destino,IdResponsable) VALUES ('.$IdAuto.','.$IdChofer.',"'.$FechaInicial.'","'.$FechaFinal.'","'.$Destino.'",'.$IdResponsable.') ';

echo $sql;


if ($conexion->query($sql)) {
  header('Location: app.php?Accion=MostrarMensaje&Mensaje=Viaje Agregado&Id='.$IdMovAutos.'&Bandera=1#Viajes');

}
else {
  header('Location: app.php?Accion=MostrarMensaje&Mensaje=No se inserto el viaje&Id='.$IdMovAutos.'&Bandera=2#Viajes');
}
// $row = $resultado->fetch_array(MYSQLI_ASSOC);

 mysqli_close($conexion);





 ?>
