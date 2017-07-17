<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "sr1920la";
$db_name = "Vehiculos";
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}


$NoEmpleado = $_POST["NoEmpleado"];
$Nombre = $_POST["Nombre"];
$ApellidoPaterno = $_POST["ApellidoPaterno"];
$ApellidoMaterno = $_POST["ApellidoMaterno"];
$Puesto =  $_POST["Puesto"];



$sql = 'INSERT INTO CatcResponsables (NoEmpleado,Nombre,ApellidoPaterno,ApellidoMaterno,Puesto,Activo) VALUES ('.$NoEmpleado.',"'.$Nombre.'","'.$ApellidoPaterno.'","'.$ApellidoMaterno.'","'.$Puesto.'",1) ';

echo $sql;


if ($conexion->query($sql)) {
  header('Location: app.php?AccionResponsables=4&MensajeResponsables=Responsable Agregado  Correctamente&Id='.$IdResponsable.'&BanderaResponsables=1#Responsables');

}
else {
  header('Location: app.php?AccionResponsables=4&MensajeResponsables=No se Agrego el Responsable&Id='.$IdResponsable.'&BanderaResponsables=2#Responsables');
}
// $row = $resultado->fetch_array(MYSQLI_ASSOC);

 mysqli_close($conexion);





 ?>
