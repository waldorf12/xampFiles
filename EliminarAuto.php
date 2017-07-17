<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "sr1920la";
$db_name = "Vehiculos";
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$IdAuto = $_GET["IdAuto"];


$sql = 'UPDATE Autos SET Activo = 0 WHERE IdAuto = '.$IdAuto.'';

echo $sql;


if ($conexion->query($sql)) {
  header('Location: app.php?AccionAutos=4&MensajeAutos=Cambio Realizado Correctamente&Id='.$IdAuto.'&BanderaAutos=1#Autos');

}
else {
  header('Location: app.php?AccionAutos=4&MensajeAutos=No se Realizo el cambio&Id='.$IdAuto.'&BanderaAutos=2#Autos');
}
// $row = $resultado->fetch_array(MYSQLI_ASSOC);

 mysqli_close($conexion);





 ?>
