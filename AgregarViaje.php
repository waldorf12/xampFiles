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

$Ocupantes = $_POST["Ocupantes"];
$Materia = $_POST["Materia"];

$AutoSFree = 0;
$ChoferSFree = 0;


//Validacion que el auto no este ocupado
$resultado = $conexion->query('
SELECT * FROM movcautos

WHERE ((FechaInicial <= "'.$FechaInicial.'"
    AND FechaFinal >= "'.$FechaFinal.'")
        OR FechaFinal BETWEEN "'.$FechaInicial.'" AND "'.$FechaFinal.'"
        OR FechaInicial BETWEEN "'.$FechaInicial.'" AND "'.$FechaFinal.'")
    AND IdAuto = '.$IdAuto.'
');
$AutoOcupado = $resultado->num_rows;
$resultado->close();
// echo $AutoOcupado;

switch ($AutoOcupado)
 {
  case '0':
  $AutoSFree = 1;
    break;

  default:
    $AutoSFree = 0;
    break;
}


//Validacion de un chofer


$resultado = $conexion->query('

  SELECT * FROM movcautos

  WHERE ((FechaInicial <= "'.$FechaInicial.'"
      AND FechaFinal >= "'.$FechaFinal.'")
          OR FechaFinal BETWEEN "'.$FechaInicial.'" AND "'.$FechaFinal.'"
          OR FechaInicial BETWEEN "'.$FechaInicial.'" AND "'.$FechaFinal.'")
      AND IdChofer = '.$IdChofer.'
  '
);
$ChoferOcupado = $resultado->num_rows;
$resultado->close();
// echo $ChoferOcupado;

switch ($ChoferOcupado)
 {
  case '0':
  $ChoferSFree = 1;
    break;

  default:
    $ChoferSFree = 0;
    break;
}


// if ($AutoSFree == 1)
// {
// echo "<br>El auto esta libre";
// }
// else {
//   echo "<br>El auto Esta ocupado";
// }
//
//
// if ($ChoferSFree == 1)
// {
// echo "<br>El Chofer esta libre";
// }
// else {
//   echo "<br>El Chofer Esta ocupado";
// }


if ($AutoSFree == 1 )
 {
    if ($ChoferSFree == 1)
    {
      //los dos estan libres, se inserta el registro

      // echo "<br>se inserta!";

      $sql = 'INSERT INTO MovcAutos (IdAuto,IdChofer,FechaInicial,FechaFinal,Destino,IdResponsable,NoOcupantes,Materia,Activo) VALUES ('.$IdAuto.','.$IdChofer.',"'.$FechaInicial.'","'.$FechaFinal.'","'.$Destino.'",'.$IdResponsable.',"'.$Ocupantes.'","'.$Materia.'",1) ';
echo $sql;
      if ($conexion->query($sql)) {
        header('Location: app.php?AccionViajes=4&MensajeViajes=Viaje Agregado  Correctamente&BanderaViajes=1#Viajes');

      }
      else {
        header('Location: app.php?AccionViajes=4&MensajeViajes=Viaje No Agregado  Correctamente&BanderaViajes=2#Viajes');
      }
    }
    else
    {
      //el chofer esta ocupado, seleccione otro chofer
      header('Location: app.php?AccionViajes=4&MensajeViajes=El Chofer esta ocupado en este rango de fechas&BanderaViajes=2#Viajes');
        // echo "<br>chofer ocupado";
    }
}
else
{
//El auto esta ocupado seleccione otro vehiculo
header('Location: app.php?AccionViajes=4&MensajeViajes=El Vehiculo esta ocupado en este rango de fechas&BanderaViajes=2#Viajes');
// echo "<br>auto ocupado";
}





// $sql = 'INSERT INTO MovcAutos (IdAuto,IdChofer,FechaInicial,FechaFinal,Destino,IdResponsable) VALUES ('.$IdAuto.','.$IdChofer.',"'.$FechaInicial.'","'.$FechaFinal.'","'.$Destino.'",'.$IdResponsable.') ';

// echo $sql;



// $row = $resultado->fetch_array(MYSQLI_ASSOC);

 mysqli_close($conexion);





 ?>
