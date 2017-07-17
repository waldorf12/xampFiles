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


$sql = 'UPDATE MovcAutos SET IdAuto = '.$IdAuto.' ,IdChofer = '.$IdChofer.',FechaInicial = "'.$FechaInicial.'",FechaFinal = "'.$FechaFinal.'" , Destino =  "'.$Destino.'" , IdResponsable = '.$IdResponsable.' WHERE IdMovAutos = '.$IdMovAutos.'';

echo $sql;


if ($conexion->query($sql)) {
  header('Location: app.php?AccionViajes=4&MensajeViajes&MensajeViajes=Viaje Modificado Correctamente&BanderaViajes=1#Viajes');

}
else {
  header('Location: app.php?AccionViajes=4&MensajeViajes&MensajeViajes=No se modifico el viaje&BanderaViajes=2#Viajes');
}
// $row = $resultado->fetch_array(MYSQLI_ASSOC);

 mysqli_close($conexion);





 ?>
