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
$Cel =  $_POST["Cel"];
$Tel =  $_POST["Tel"];
$Puesto =  $_POST["Puesto"];



$sql = 'INSERT INTO CatcChoferes (NoEmpleado,Nombre,ApellidoPaterno,ApellidoMaterno,Cel,Tel,Puesto,Activo) VALUES ('.$NoEmpleado.',"'.$Nombre.'","'.$ApellidoPaterno.'","'.$ApellidoMaterno.'","'.$Cel.'","'.$Tel.'","'.$Puesto.'",1) ';

echo $sql;


if ($conexion->query($sql)) {
  header('Location: app.php?AccionChoferes=4&MensajeChoferes=Chofer Agregado&Id='.$IdChofer.'&BanderaChoferes=1#Choferes');

}
else {
  header('Location: app.php?AccionChoferes=4&MensajeChoferes=No se Agrego el Chofer&Id='.$IdChofer.'&BanderaChoferes=2#Choferes');
}
// $row = $resultado->fetch_array(MYSQLI_ASSOC);

 mysqli_close($conexion);





 ?>
