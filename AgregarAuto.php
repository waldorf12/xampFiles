<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "sr1920la";
$db_name = "Vehiculos";
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}


$Linea = $_POST["Linea"];
$Modelo = $_POST["Modelo"];
$Marca = $_POST["Marca"];
$Placa = $_POST["Placa"];
$NoSerie =  $_POST["NoSerie"];
$Ocupantes =  $_POST["Ocupantes"];
$KML =  $_POST["KML"];



$sql = 'INSERT INTO Autos (Linea,Modelo,Marca,Placa,NoSerie,Ocupantes,KML,Activo) VALUES ("'.$Linea.'","'.$Modelo.'","'.$Marca.'","'.$Placa.'","'.$NoSerie.'",'.$Ocupantes.','.$KML.',1) ';

echo $sql;


if ($conexion->query($sql)) {
  header('Location: app.php?AccionAutos=4&MensajeAutos&MensajeAutos=Auto Agregado&BanderaAutos=1#Autos');

}
else {
  header('Location: app.php?AccionAutos=4&MensajeAutos&MensajeAutos=No se inserto el Auto&BanderaAutos=2#Autos');
}
// $row = $resultado->fetch_array(MYSQLI_ASSOC);

 mysqli_close($conexion);





 ?>
