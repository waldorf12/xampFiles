<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "sr1920la";
$db_name = "Vehiculos";
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$IdChofer = $_POST["IdChofer"];
$NoEmpleado = $_POST["NoEmpleado"];
$Nombre = $_POST["Nombre"];
$ApellidoPaterno = $_POST["ApellidoPaterno"];
$ApellidoMaterno = $_POST["ApellidoMaterno"];
$Cel =  $_POST["Cel"];
$Tel =  $_POST["Tel"];
$Puesto =  $_POST["Puesto"];


$sql = 'UPDATE CatcChoferes SET NoEmpleado = '.$NoEmpleado.',Nombre = "'.$Nombre.'",ApellidoPaterno = "'.$ApellidoPaterno.'" , ApellidoMaterno =  "'.$ApellidoMaterno.'" , Cel = "'.$Cel.'" ,  Tel = "'.$Tel.'" , Puesto = "'.$Puesto.'"   WHERE IdChofer = '.$IdChofer.'';

echo $sql;


if ($conexion->query($sql)) {
  header('Location: app.php?AccionChoferes=4&MensajeChoferes=Cambio Realizado Correctamente&Id='.$IdChofer.'&BanderaChoferes=1#Choferes');

}
else {
  header('Location: app.php?AccionChoferes=4&MensajeChoferes=No se Realizo el cambio&Id='.$IdChofer.'&BanderaChoferes=2#Choferes');
}
// $row = $resultado->fetch_array(MYSQLI_ASSOC);

 mysqli_close($conexion);





 ?>
