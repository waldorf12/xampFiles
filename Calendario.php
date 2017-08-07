
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='assets/css/fullcalendar.min.css' rel='stylesheet' />
<link href='assets/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='assets/js/moment.min.js'></script>
<script src='assets/js/jquery.min.js'></script>
<script src='assets/js/fullcalendar.min.js'></script>
<script src='assets/fullcalendar-3.4.0/locale-all.js'></script>
<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			lang: 'es',
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			// defaultDate: 'today',

			navLinks: true, // can click day/week names to navigate views
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: [

        // Codigo php

        <?php

        $host_db = "localhost";
        $user_db = "root";
        $pass_db = "sr1920la";
        $db_name = "Vehiculos";
        $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

        if ($conexion->connect_error) {
         die("La conexion falló: " . $conexion->connect_error);
        }

        $sql = 'SELECT a.IdMovAutos As Id,Concat(b.Linea," ",b.Modelo) As Auto, Concat(c.Nombre," ",c.ApellidoPaterno) As Chofer, a.FechaInicial ,a.FechaFinal, a.Destino, Concat(d.Nombre," ",d.ApellidoPaterno) As Responsable  FROM MovcAutos a INNER JOIN Autos b on a.IdAuto = b.IdAuto INNER JOIN CatcChoferes c on a.IdChofer = c.IdChofer INNER JOIN CatcResponsables d on a.IdResponsable = d.IdResponsable ';


        $resultado = $conexion->query($sql);

        while ($row = $resultado->fetch_assoc() )
         {
            // echo '	{
						//
      			// 		title: "'.$row["Auto"].'-'.$row["Chofer"].'",
      			// 		start: "'.$row["FechaInicial"].'",
            //     	end: "'.$row["FechaFinal"].'",
      			// 	},';
							$FechaMas1 = 	$row["FechaFinal"];

							$nuevafecha = strtotime ( '+1 day' , strtotime ( $FechaMas1 ) ) ;
							$nuevafecha = date ( 'Y-m-j' , $nuevafecha );

							// echo $nuevafecha;

						echo '
						{
							title: "'.$row["Auto"].' - '.$row["Chofer"].' - '.$row["Responsable"].' - '.$row["FechaInicial"].' a '.$row["FechaFinal"].' ",
							start: "'.$row["FechaInicial"].'",
							end: "'.$nuevafecha.'"
						},

						';
          }

          mysqli_close($conexion);




         ?>


        // Bucle php

			]
			,lang: 'es'
		});

	});

</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
</head>
<body>

	<div id='calendar'></div>

</body>
</html>
