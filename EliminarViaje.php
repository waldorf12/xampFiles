<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "sr1920la";
$db_name = "Vehiculos";
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$IdMovAutos = $_GET["IdMovAutos"];


$sql = 'UPDATE MovcAutos SET Activo = 0 WHERE IdMovAutos = '.$IdMovAutos.'';

echo $sql;


if ($conexion->query($sql)) {
  header('Location: app.php?AccionViajes=4&MensajeViajes=Cambio Realizado Correctamente&Id='.$IdMovAutos.'&BanderaViajes=1#Viajes');

}
else {
  header('Location: app.php?AccionViajes=4&MensajeViajes=No se Realizo el cambio&Id='.$IdMovAutos.'&BanderaViajes=2#Viajes');
}
// $row = $resultado->fetch_array(MYSQLI_ASSOC);

 mysqli_close($conexion);





 ?>
