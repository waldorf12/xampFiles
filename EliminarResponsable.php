<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "sr1920la";
$db_name = "Vehiculos";
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$IdResponsable = $_GET["IdResponsable"];


$sql = 'UPDATE CatcResponsables SET Activo = 0 WHERE IdResponsable = '.$IdResponsable.'';

echo $sql;


if ($conexion->query($sql)) {
  header('Location: app.php?AccionResponsables=4&MensajeResponsables=Cambio Realizado Correctamente&Id='.$IdResponsable.'&BanderaResponsables=1#Responsables');

}
else {
  header('Location: app.php?AccionResponsables=4&MensajeResponsables=No se Realizo el cambio&Id='.$IdResponsable.'&BanderaResponsables=2#Responsables');
}
// $row = $resultado->fetch_array(MYSQLI_ASSOC);

 mysqli_close($conexion);





 ?>
