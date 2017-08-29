<?php


session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	} else {
	      header('Location: Error.php?Mensaje=No Existe sesión');

	exit;
	}
	$now = time();
  $expiracion = $_SESSION['expire'];

  // echo "$now";
  // echo "<br>";
  // echo "$expiracion";

	if($now > $_SESSION['expire']) {
	session_destroy();

     header('Location: Error.php?Mensaje=Tiempo Agotado');
	exit;
	}

$host_db = "localhost";
$user_db = "root";
$pass_db = "sr1920la";
$db_name = "Vehiculos";
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Vehiculos Ingenieria</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.css" />
	<script src='assets/fullcalendar-3.4.0/locale-all.js'></script>
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body>
	<!-- Wrapper-->
	<div id="wrapper">
		<!-- Nav -->
		<nav id="nav">
			<a href="app.php" class="icon fa-home active"><span>Home</span></a>
			<a href="#Viajes" class="icon fa-map-marker"><span>Viajes</span></a>
			<a href="#Autos" class="icon fa-car"><span>Autos</span></a>
			<a href="#Choferes" class="icon fa-users"><span>Choferes</span></a>
      <a href="#Responsables" class="icon fa-star"><span>Responsables</span></a>
			<a href="#Calendario" class="icon fa-calendar"><span>Calendario</span></a>
			<!-- <a href="#Consultar" class="icon fa-search"><span>Consultar</span></a> -->
		</nav>
		<!-- Main -->
		<div id="main">
			<!-- Me -->
			<article id="me" class="panel">
				<header>
					<h1>Control Vehicular</h1>
					<p>
						<!-- <form class="" action="index.html" method="post"> -->
              <a href="app.php?AccionViajes=0#Viajes">  <input type="button" name="" value="Viajes"></a>
              <!-- <a href="app.php?AccionAutos=0#Autos">  <input type="button" name="" value="Autos"></a> -->
              <a href="app.php?AccionChoferes=0#Choferes">  <input type="button" name="" value="Choferes"></a>
							<!-- <input type="submit" name="" value="Calendario"> -->
              <a href="app.php?AccionResponsables=0#Responsables">  <input type="button" name="" value="Responsables"></a>
              <a href="logout.php">  <input type="button" name="" value="Salir"></a>

						<!-- </form> -->
					</p>
					<!-- <p>Opciones Principales</p> -->
				</header>
				<a href="#work" class="jumplink pic">
									<span class="arrow icon fa-chevron-right"><span>See my work</span></span>
									<img src="images/me2.jpg" alt="" />
								</a>
			</article>
			<article id="Viajes" class="panel">
				<header>
					<h2>Viajes</h2>
				</header>
				<p>
					Seccion de muestra adición y modificacion de Viajes.

				</p>

        <?php


            $AccionViajes = 0;
            if (isset($_GET["AccionViajes"]))
             {
            $AccionViajes=  $_GET["AccionViajes"];
            }

              if ( isset($_GET["IdMovAutos"]) )
               {
                $IdMovAutos = $_GET["IdMovAutos"];
              }

          switch ($AccionViajes) {

            case '1':
            //Insertar

            echo '<form action="AgregarViaje.php" method="post" name="AgregarViaje">
              <div>
                <div class="row">


<script type="text/javascript">

	function TontaValidacionDeOscar()
	{
			var AuxOSK  = $("#IdResponsable").val();

			if (AuxOSK == 0)

			{
					alert("No Oskar necesitas seleccionar un responsable");
			}
			else
			{
				 document.AgregarViaje.submit()
			}

	}
</script>



                  <div class="6u 12u$(mobile)">
                    <label for="">Auto</label>

                    <select class="" name="IdAuto">';
                    echo '<option value="0" >Seleccione un vehiculo</option>';
                    $sql = 'SELECT *,Concat(Linea," ", Modelo) As LineaModelo FROM Autos ';
                    $resultado = $conexion->query($sql);
                    while ($row = $resultado->fetch_assoc() )
                     {
                      echo '<option value="'.$row["IdAuto"].'" >'.$row["LineaModelo"].'</option>';
                  }
                  echo			'	</select></div>
                        <div class="6u$ 12u$(mobile)">
                        <label for="">Chofer</label>

                        <select class="" name="IdChofer">
                        ';
                        echo '<option value="0" >Seleccione un Chofer</option>';
                        $sql = 'SELECT *,Concat(Nombre," ",ApellidoPaterno) As Chofer  FROM CatcChoferes';
                        $resultado = $conexion->query($sql);
                        while ($row = $resultado->fetch_assoc() )
                         {
                          echo '<option value="'.$row["IdChofer"].'" >'.$row["Chofer"].'</option>';
                    }
                    echo '
                    </select>
                        </div>

                        <div class="6u 12u$(mobile)">
                        <label for="">Fecha Inicial</label>

                        <input type="text" name="FechaInicial" id="datetimepicker1" placeholder="FechaInicial" value="" required>
                        </div>

                        <div class="6u$ 12u$(mobile)">
                        <label for="">Fecha Final</label>

                        <input type="text" name="FechaFinal" id="datetimepicker2" placeholder="FechaFinal" value="" required>
                        </div>

													<!--  -->
												<div class="6u 12u$(mobile)">
                        <label for="">Ocupantes</label>

                        <input type="text" name="Ocupantes" placeholder="Ocupantes" value="" required>
                        </div>

                        <div class="6u$ 12u$(mobile)">
                        <label for="">Materia</label>

                        <input type="text" name="Materia"  placeholder="Materias" value="" required>
                        </div>





                        <div class="12u$">
                        <label for="">Destino</label>

                          <input type="text" name="Destino" placeholder="Destino" value="" required />
                        </div>
                        <div class="12u$">
                        <label for="">Responsable</label>

                          <select class="" name="IdResponsable" required id="IdResponsable"> ';
                          echo '<option value="0" >Seleccione un Responsable</option>';
                              $sql = 'SELECT *,Concat(NoEmpleado,"  ",Nombre," ",ApellidoPaterno) As Responsable  FROM CatcResponsables Where Activo = 1';
                              $resultado = $conexion->query($sql);
                              while ($row = $resultado->fetch_assoc() )
                               {
                                echo '<option value="'.$row["IdResponsable"].'" >'.$row["Responsable"].'</option>';
                          }
                      echo '
                      </select>
                        </div>
                        <div class="12u$">
                          <!-- <input type="submit" value="Guardar" /> -->

													      <input type="button" value="Guardar" onclick="TontaValidacionDeOscar();"/>
                        </div>
                      </div>
                    </div>
                  </form>




            ';


              break;
//Modificar
            case '2':

            echo '<form action="ModificarViaje.php" method="post">
              <div>
                <div class="row">
                  <div class="6u 12u$(mobile)">
                  <label for="">Auto</label>

                    <select class="" name="IdAuto">';
                    $sql = 'SELECT *,Concat(c.Nombre," ",c.ApellidoPaterno) As Chofer,Concat(e.NoEmpleado,"  ",e.Nombre," ",e.ApellidoPaterno) As Responsable, Concat(b.Linea," ", b.Modelo) As LineaModelo FROM MovcAutos a Inner Join Autos b on a.IdAuto = b.IdAuto INNER JOIN CatcChoferes c on a.IdChofer = c.IdChofer Inner Join CatcResponsables e on a.IdResponsable = e.IdResponsable Where IdMovAutos = '.$IdMovAutos.'';
                    $resultado = $conexion->query($sql);
                    $row = $resultado->fetch_array(MYSQLI_ASSOC);
                    $IdAuto = $row["IdAuto"];
                    $Linea = $row["LineaModelo"];
                    $IdChofer = $row["IdChofer"];
                    $Chofer = $row["Chofer"];
                    $FechaInicial = $row["FechaInicial"];
                    $FechaFinal = $row["FechaFinal"];
										$Ocupantes = $row["NoOcupantes"];
										$Materia = $row["Materia"];
                    $Destino =  $row["Destino"];
                    $Responsable =  $row["Responsable"];
                    $IdResponsable =  $row["IdResponsable"];
                    echo '<option value="'.$IdAuto.'" >'.$Linea.'</option>';
                    $sql = 'SELECT *,Concat(Linea," ", Modelo) As LineaModelo FROM Autos ';
                    $resultado = $conexion->query($sql);
                    while ($row = $resultado->fetch_assoc() )
                     {
                      echo '<option value="'.$row["IdAuto"].'" >'.$row["LineaModelo"].'</option>';
                }
            echo			'	</select></div>
                  <div class="6u$ 12u$(mobile)">
                  <label for="">Chofer</label>

                  <select class="" name="IdChofer">
                  ';
                  echo '<option value="'.$IdChofer.'" >'.$Chofer.'</option>';
                  $sql = 'SELECT *,Concat(Nombre," ",ApellidoPaterno) As Chofer  FROM CatcChoferes';
                  $resultado = $conexion->query($sql);
                  while ($row = $resultado->fetch_assoc() )
                   {
                    echo '<option value="'.$row["IdChofer"].'" >'.$row["Chofer"].'</option>';
              }
              echo '		</select>

                  </div>


                  <div class="6u 12u$(mobile)">
                  <label for="">Fecha Inicial</label>
                  <input type="text" name="FechaInicial" placeholder="FechaInicial" id="datetimepicker3" value="'.$FechaInicial.'">
                  </div>


                  <div class="6u$ 12u$(mobile)">
                  <label for="">Fecha Final</label>
                  <input type="text" name="FechaFinal" placeholder="FechaFinal" id="datetimepicker4" value="'.$FechaFinal.'">
                  </div>



                  <div class="6u 12u$(mobile)">
                  <label for="">Ocupantes</label>
                  <input type="text" name="Ocupantes" placeholder="Ocupantes" value="'.$Ocupantes.'">
                  </div>


                  <div class="6u$ 12u$(mobile)">
                  <label for="">Materia</label>
                  <input type="text" name="Materia" placeholder="Materia"  value="'.$Materia.'">
                  </div>



                  <div class="12u$">
                  <label for="">Destino</label>

                    <input type="text" name="Destino" placeholder="Destino" value="'.$Destino.'" />
                  </div>
                  <div class="12u$">
                  <label for="">Responsable</label>

                    <select class="" name="IdResponsable"> ';
                    // <option value="0" >ResponsableSeleccionado</option>
                        echo '<option value="'.$IdResponsable.'" >'.$Responsable.'</option>';
                        $sql = 'SELECT *,Concat(NoEmpleado,"  ",Nombre," ",ApellidoPaterno) As Responsable  FROM CatcResponsables';
                        $resultado = $conexion->query($sql);
                        while ($row = $resultado->fetch_assoc() )
                         {
                          echo '<option value="'.$row["IdResponsable"].'" >'.$row["Responsable"].'</option>';
                    }
                echo '	</select>
                  </div>
                  <div class="12u$">
                    <input type="text" name="IdMovAutos" value="'.$IdMovAutos.'" style="display:none;">
                    <input type="submit" value="Guardar" />
                    <a href="app.php#Viajes">  <input type="button" value="Regresar" /></a><a href="EliminarViaje.php?IdMovAutos='.$IdMovAutos.'"> <input type="button" style="color:Red;" value="Eliminar" /></a>

                  </div>
                </div>
              </div>
            </form>
            ';



              break;

            case '4':

            $Mensaje = $_GET["MensajeViajes"];
            $Bandera = $_GET["BanderaViajes"];
            if ($Bandera == 1)
            {
              echo '<div class="alert alert-success" role="alert">
              <strong>Bien!!</strong> '.$Mensaje.'.
              </div>
              <div class="12u$">
                <a href="app.php#Viajes">  <input type="button" value="Regresar" /></a>
              </div>

              ';
            }
            else {

              echo '<div class="alert alert-warning" role="alert">
              <strong>Mal!!</strong> '.$Mensaje.'.
              </div>
              <div class="12u$">
                <a href="app.php#Viajes">  <input type="button" value="Regresar" /></a>
              </div>

              ';
            }


              break;

            default:


            echo '
            <section>
              <div class="row">
							<div class="12u$">


							<a href="app.php?AccionViajes=1#Viajes">  <input type="button" name="" value="Agregar"></a>
							</div>
                <div class="12u 12u$(mobile)">
                  <!-- <a href="#" class="image fit"><img src="images/pic01.jpg" alt=""></a> -->
                  <table class="table table-striped">
                    <thead>
                      <tr>
                      <th>Mod</th>
                    <th>Auto</th>
                    <th>Chofer</th>
                    <th>Fecha Inicial</th>
                    <th>Fecha Final</th>
                    <th>Destino</th>
                    <th>Responsable</th>
										<th>Mat</th>
										<th>Ocup</th>


                      </tr>
                    </thead>
                    <tbody>';
                    $sql = 'SELECT a.IdMovAutos,Concat(b.Linea," ",b.Modelo) As Auto, Concat(c.Nombre," ",c.ApellidoPaterno) As Chofer,  DATE_FORMAT(a.FechaInicial, "%d-%b-%Y ")  As FechaInicial,DATE_FORMAT(a.FechaFinal, "%d-%b-%Y ")  As FechaFinal, a.Destino, Concat(d.Nombre," ",d.ApellidoPaterno) As Responsable ,a.NoOcupantes As Ocupantes, a.Materia As Materia FROM MovcAutos a INNER JOIN Autos b on a.IdAuto = b.IdAuto INNER JOIN CatcChoferes c on a.IdChofer = c.IdChofer INNER JOIN CatcResponsables d on a.IdResponsable = d.IdResponsable WHERE a.Activo = 1 ORDER BY 7  ';
                    $resultado = $conexion->query($sql);
                    while ($row = $resultado->fetch_assoc() )
                     {
                        echo '
                        <tr">
                                <td><a href="app.php?AccionViajes=2&IdMovAutos='.$row["IdMovAutos"].'#Viajes"><span class="icon fa-pencil"></span></a></td>
                                <td>'.$row["Auto"].'</td>
                                <td>'.$row["Chofer"].'</td>
                                <td>'.$row["FechaInicial"].'</td>
                                <td>'.$row["FechaFinal"].'</td>
                                <td>'.$row["Destino"].'</td>
                                <td>'.$row["Responsable"].'</td>
																<td>'.$row["Materia"].'</td>
																<td>'.$row["Ocupantes"].'</td>
                              </tr>
                              ';
                        }

  echo '       </tbody>
                  </table>
                </div>
                <div class="12u 12u$(mobile)">
                <a href="app.php?AccionViajes=1#Viajes">  <input type="button" name="" value="Agregar"></a>
                </div>

              </div>
            </section>';






              break;
          } // end switch







         ?>







			</article>
			<article id="Autos" class="panel">
				<header>
					<h2>Autos</h2>
				</header>
				<p>
					Seccion de muestra y modificacion de Autos.
				</p>
        <?php


            $AccionAutos = 0;
            if (isset($_GET["AccionAutos"]))
             {
            $AccionAutos=  $_GET["AccionAutos"];
            }

              if ( isset($_GET["IdAuto"]) )
               {
                $IdAuto = $_GET["IdAuto"];
              }

          switch ($AccionAutos) {

            case '1':
            //Insertar

            echo '<form action="AgregarAuto.php" method="post">
              <div>
                <div class="row">
                  <div class="6u 12u$(mobile)">
                    <label for="">Linea</label>
                    <input type="text" name="Linea" placeholder="Linea" value="">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                      <label for="">Modelo</label>
                      <input type="text" name="Modelo" placeholder="Modelo" value="">
                  </div>
                  <div class="6u 12u$(mobile)">
                    <label for="">Marca</label>
                  <input type="text" name="Marca" placeholder="Marca" value="">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                    <label for="">Placa</label>
                  <input type="text" name="Placa" placeholder="Placa" value="">
                  </div>
                  <div class="6u 12u$(mobile)">
                    <label for="">NoSerie</label>
                  <input type="text" name="NoSerie" placeholder="NoSerie" value="">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                    <label for="">Ocupantes</label>
                  <input type="text" name="Ocupantes" placeholder="Ocupantes" value="">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                  <label for="">KM/L</label>
                    <input type="text" name="KML" placeholder="KML" value="">
                  </div>

                  <div class="12u$">
                    <input type="submit" value="Guardar" />
                    <a href="app.php#Autos">  <input type="button" value="Regresar" /></a>
                  </div>
                </div>
              </div>
            </form>
            ';


              break;
//Modificar
            case '2':

            $sql = 'SELECT * FROM Autos Where IdAuto = '.$IdAuto.'';
            $resultado = $conexion->query($sql);
            $row = $resultado->fetch_array(MYSQLI_ASSOC);

            $IdAuto = $row["IdAuto"];
            $Linea = $row["Linea"];
            $Modelo = $row["Modelo"];
            $Marca = $row["Marca"];
            $Placa = $row["Placa"];
            $NoSerie =  $row["NoSerie"];
            $Poliza =  $row["Poliza"];
            $Ocupantes =  $row["Ocupantes"];
            $KML =  $row["KML"];



            echo '<form action="ModificarAuto.php" method="post">
              <div>
                <div class="row">
                  <div class="6u 12u$(mobile)">
                    <label for="">Linea</label>
                    <input type="text" name="Linea" placeholder="Linea" value="'.$Linea.'">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                      <label for="">Modelo</label>
                      <input type="text" name="Modelo" placeholder="Modelo" value="'.$Modelo.'">
                  </div>
                  <div class="6u 12u$(mobile)">
                    <label for="">Marca</label>
                  <input type="text" name="Marca" placeholder="Marca" value="'.$Marca.'">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                    <label for="">Placa</label>
                  <input type="text" name="Placa" placeholder="Placa" value="'.$Placa.'">
                  </div>
                  <div class="6u 12u$(mobile)">
                    <label for="">NoSerie</label>
                  <input type="text" name="NoSerie" placeholder="NoSerie" value="'.$NoSerie.'">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                    <label for="">Ocupantes</label>
                  <input type="text" name="Ocupantes" placeholder="Ocupantes" value="'.$Ocupantes.'">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                  <label for="">KM/L</label>
                    <input type="text" name="KML" placeholder="KML" value="'.$KML.'">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                    <a href="EliminarAuto.php?IdAuto='.$IdAuto.'">  <input type="button" value="Eliminar" style="color:red;" /></a>

                  </div>

                  <div class="12u$">
                    <input type="text" name="IdAuto" value="'.$IdAuto.'" style="display:none;">
                    <input type="submit" value="Guardar" />
                    <a href="app.php#Autos">  <input type="button" value="Regresar" /></a>
                  </div>
                </div>
              </div>
            </form>
            ';

              break;

            case '4':

            $Mensaje = $_GET["MensajeAutos"];
            $Bandera = $_GET["BanderaAutos"];
            if ($Bandera == 1)
            {
              echo '<div class="alert alert-success" role="alert">
              <strong>Bien!!</strong> '.$Mensaje.'.
              </div>
              <div class="12u$">
                <a href="app.php#Autos">  <input type="button" value="Regresar" /></a>
              </div>

              ';
            }
            else {

              echo '<div class="alert alert-warning" role="alert">
              <strong>Mal!!</strong> '.$Mensaje.'.
              </div>
              <div class="12u$">
                <a href="app.php#Autos">  <input type="button" value="Regresar" /></a>
              </div>

              ';
            }


              break;

            default:


            echo '
            <section>
              <div class="row">
                <div class="12u 12u$(mobile)">
                  <!-- <a href="#" class="image fit"><img src="images/pic01.jpg" alt=""></a> -->
                  <table class="table table-striped">
                    <thead>
                      <tr>
                          <th>Mod</th>
                        <th>Linea</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Placa</th>
                        <th>NoSerie</th>
                        <th>Ocupantes</th>
                        <th>KM/L</th>


                      </tr>
                    </thead>
                    <tbody>';

                          $sql = 'SELECT * FROM Autos Where Activo = 1';
                          $resultado = $conexion->query($sql);
                          while ($row = $resultado->fetch_assoc() )
                           {
                              echo '
                              <tr">
                                      <td><a href="app.php?AccionAutos=2&IdAuto='.$row["IdAuto"].'#Autos"><span class="icon fa-pencil"></span></a></td>
                                      <td>'.$row["Linea"].'</td>
                                      <td>'.$row["Modelo"].'</td>
                                      <td>'.$row["Marca"].'</td>
                                      <td>'.$row["Placa"].'</td>
                                      <td>'.$row["NoSerie"].'</td>
                                      <td>'.$row["Ocupantes"].'</td>
                                      <td>'.$row["KML"].'</td>

                                    </tr>
                                    ';
                              }

  echo '       </tbody>
                  </table>
                </div>
                <div class="12u 12u$(mobile)">
                <a href="app.php?AccionAutos=1#Autos">  <input type="button" name="" value="Agregar"></a>
                </div>
                <div class="12u 12u$(mobile)" id="AutosDown" >
                  <p></p>
                </div>
              </div>
            </section>';






              break;
          } // end switch







         ?>

			</article>
      <article id="Choferes" class="panel">
				<header>
					<h2>Choferes</h2>
				</header>
				<p>
					Seccion de muestra y modificacion de Choferes.
				</p>
        <?php


            $AccionChoferes = 0;
            if (isset($_GET["AccionChoferes"]))
             {
            $AccionChoferes=  $_GET["AccionChoferes"];
            }

              if ( isset($_GET["IdChofer"]) )
               {
                $IdChofer = $_GET["IdChofer"];
              }

          switch ($AccionChoferes) {

            case '1':
            //Insertar

            echo '<form action="AgrgarChofer.php" method="post">
              <div>
                <div class="row">
                  <div class="6u 12u$(mobile)">
                    <label for="">NoEmpleado</label>
                    <input type="text" name="NoEmpleado" placeholder="NoEmpleado" value="">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                      <label for="">Nombre</label>
                      <input type="text" name="Nombre" placeholder="Nombre" value="">
                  </div>
                  <div class="6u 12u$(mobile)">
                    <label for="">Apellido Paterno</label>
                  <input type="text" name="ApellidoPaterno" placeholder="ApellidoPaterno" value="">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                    <label for="">Apellido Materno</label>
                  <input type="text" name="ApellidoMaterno" placeholder="ApellidoMaterno" value="">
                  </div>
                  <div class="6u 12u$(mobile)">
                    <label for="">Cel</label>
                  <input type="text" name="Cel" placeholder="Cel" value="">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                    <label for="">Tel</label>
                  <input type="text" name="Tel" placeholder="Tel" value="">
                  </div>
                  <div class="12u$ 12u$(mobile)">
                  <label for="">Puesto</label>
                    <input type="text" name="Puesto" placeholder="Puesto" value="">
                  </div>


                  <div class="12u$">
                    <input type="submit" value="Guardar" />
                    <a href="app.php#Choferes">  <input type="button" value="Regresar" /></a>
                  </div>
                </div>
              </div>
            </form>
            ';


              break;
//Modificar
            case '2':



            $sql = 'SELECT * FROM catcchoferes Where IdChofer = '.$IdChofer.'';

            $resultado = $conexion->query($sql);
            $row = $resultado->fetch_array(MYSQLI_ASSOC);

            $IdChofer = $row["IdChofer"];
            $NoEmpleado = $row["NoEmpleado"];
            $Nombre = $row["Nombre"];
            $ApellidoPaterno = $row["ApellidoPaterno"];
            $ApellidoMaterno = $row["ApellidoMaterno"];
            $Cel =  $row["Cel"];
            $Tel =  $row["Tel"];
            $Puesto =  $row["Puesto"];



            echo '<form action="ModificarChofer.php" method="post">
              <div>
                <div class="row">
                  <div class="6u 12u$(mobile)">
                    <label for="">NoEmpleado</label>
                    <input type="text" name="NoEmpleado" placeholder="NoEmpleado" value="'.$NoEmpleado.'">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                      <label for="">Nombre</label>
                      <input type="text" name="Nombre" placeholder="Nombre" value="'.$Nombre.'">
                  </div>
                  <div class="6u 12u$(mobile)">
                    <label for="">Apellido Paterno</label>
                  <input type="text" name="ApellidoPaterno" placeholder="ApellidoPaterno" value="'.$ApellidoPaterno.'">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                    <label for="">Apellido Materno</label>
                  <input type="text" name="ApellidoMaterno" placeholder="ApellidoMaterno" value="'.$ApellidoMaterno.'">
                  </div>
                  <div class="6u 12u$(mobile)">
                    <label for="">Cel</label>
                  <input type="text" name="Cel" placeholder="Cel" value="'.$Cel.'">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                    <label for="">Tel</label>
                  <input type="text" name="Tel" placeholder="Tel" value="'.$Tel.'">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                  <label for="">Puesto</label>
                    <input type="text" name="Puesto" placeholder="Puesto" value="'.$Puesto.'">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                    <a href="EliminarChofer.php?IdChofer='.$IdChofer.'">  <input type="button" value="Eliminar" style="color:red;" /></a>

                  </div>

                  <div class="12u$">
                    <input type="text" name="IdChofer" value="'.$IdChofer.'" style="display:none;">
                    <input type="submit" value="Guardar" />
                    <a href="app.php#Choferes">  <input type="button" value="Regresar" /></a>
                  </div>
                </div>
              </div>
            </form>
            ';

              break;

            case '4':

            $Mensaje = $_GET["MensajeChoferes"];
            $Bandera = $_GET["BanderaChoferes"];
            if ($Bandera == 1)
            {
              echo '<div class="alert alert-success" role="alert">
              <strong>Bien!!</strong> '.$Mensaje.'.
              </div>
              <div class="12u$">
                <a href="app.php#Choferes">  <input type="button" value="Regresar" /></a>
              </div>

              ';
            }
            else {

              echo '<div class="alert alert-warning" role="alert">
              <strong>Mal!!</strong> '.$Mensaje.'.
              </div>
              <div class="12u$">
                <a href="app.php#Choferes">  <input type="button" value="Regresar" /></a>
              </div>

              ';
            }


              break;

            default:


            echo '
            <section>
              <div class="row">
                <div class="12u 12u$(mobile)">
                  <!-- <a href="#" class="image fit"><img src="images/pic01.jpg" alt=""></a> -->
                  <table class="table table-striped">
                    <thead>
                      <tr>
                          <th>Mod</th>
                        <th>NoEmpleado</th>
                        <th>Nombre</th>
                        <th>Cel</th>
                        <th>Tel</th>
                        <th>Puesto</th>
                      </tr>
                    </thead>
                    <tbody>';

                          $sql = 'SELECT *,Concat(Nombre," ",ApellidoPaterno," ",ApellidoMaterno) As NombreCompleto FROM CatcChoferes Where Activo = 1';
                          $resultado = $conexion->query($sql);
                          while ($row = $resultado->fetch_assoc() )
                           {
                              echo '
                              <tr">
                                      <td><a href="app.php?AccionChoferes=2&IdChofer='.$row["IdChofer"].'#Choferes"><span class="icon fa-pencil"></span></a></td>
                                      <td>'.$row["NoEmpleado"].'</td>
                                      <td>'.$row["NombreCompleto"].'</td>
                                      <td>'.$row["Cel"].'</td>
                                      <td>'.$row["Tel"].'</td>
                                      <td>'.$row["Puesto"].'</td>
                                    </tr>
                                    ';
                              }

  echo '       </tbody>
                  </table>
                </div>
                <div class="12u 12u$(mobile)">
                <a href="app.php?AccionChoferes=1#Choferes">  <input type="button" name="" value="Agregar"></a>
                </div>

              </div>
            </section>';






              break;
          } // end switch







         ?>

			</article>
			<article id="Calendario" class="panel">
				<header>
					<h2>Calendario</h2>
				</header>
				<p>
					Autos ocupados por fecha y hora
				</p>
				<section>
					<div class="row">
						<div class="12u 12u$(mobile)">
							<iframe src="Calendario.php" width="850px" height="750px"></iframe>
						</div>
						<div class="12u 12u$(mobile)">
							<input type="button" name="" value="Refrescar" onclick="location.reload();">
						</div>
					</div>
				</section>
			</article>
			<article id="Consultar" class="panel">
				<header>
					<h2>Consulta</h2>
				</header>
				<form action="#" method="post">
					<div>
						<div class="row">
							<div class="6u 12u$(mobile)">
								<input type="text" name="name" placeholder="Name" />
							</div>
							<div class="6u$ 12u$(mobile)">
								<input type="text" name="email" placeholder="Email" />
							</div>
							<div class="12u$">
								<input type="text" name="subject" placeholder="Subject" />
							</div>
							<div class="12u$">
								<textarea name="message" placeholder="Message" rows="8"></textarea>
							</div>
							<div class="12u$">
								<input type="submit" value="Send Message" />
							</div>
						</div>
					</div>
				</form>
			</article>


      <article id="Responsables" class="panel">
				<header>
					<h2>Responsables</h2>
				</header>
				<p>
					Seccion de muestra y modificacion de Responsables.
				</p>
        <?php


            $AccionResponsables = 0;
            if (isset($_GET["AccionResponsables"]))
             {
            $AccionResponsables=  $_GET["AccionResponsables"];
            }

              if ( isset($_GET["IdResponsable"]) )
               {
                $IdResponsable = $_GET["IdResponsable"];
              }

          switch ($AccionResponsables) {

            case '1':
            //Insertar

            echo '<form action="AgregarResponsables.php" method="post">
              <div>
                <div class="row">
                  <div class="6u 12u$(mobile)">
                    <label for="">NoEmpleado</label>
                    <input type="text" name="NoEmpleado" placeholder="NoEmpleado" value="">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                      <label for="">Nombre</label>
                      <input type="text" name="Nombre" placeholder="Nombre" value="">
                  </div>
                  <div class="6u 12u$(mobile)">
                    <label for="">Apellido Paterno</label>
                  <input type="text" name="ApellidoPaterno" placeholder="ApellidoPaterno" value="">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                    <label for="">Apellido Materno</label>
                  <input type="text" name="ApellidoMaterno" placeholder="ApellidoMaterno" value="">
                  </div>
                  <div class="12u$ 12u$(mobile)">

                  <label for="">Puesto</label>
                    <input type="text" name="Puesto" placeholder="Puesto" value="">
                  </div>


                  <div class="12u$">
                    <input type="submit" value="Guardar" />
                    <a href="app.php#Responsables">  <input type="button" value="Regresar" /></a>
                  </div>
                </div>
              </div>
            </form>
            ';


              break;
//Modificar
            case '2':



            $sql = 'SELECT * FROM CatcResponsables Where IdResponsable = '.$IdResponsable.'';

            $resultado = $conexion->query($sql);
            $row = $resultado->fetch_array(MYSQLI_ASSOC);

            $IdResponsable = $row["IdResponsable"];
            $NoEmpleado = $row["NoEmpleado"];
            $Nombre = $row["Nombre"];
            $ApellidoPaterno = $row["ApellidoPaterno"];
            $ApellidoMaterno = $row["ApellidoMaterno"];
            $Puesto =  $row["Puesto"];



            echo '<form action="ModificarResponsable.php" method="post">
              <div>
                <div class="row">
                  <div class="6u 12u$(mobile)">
                    <label for="">NoEmpleado</label>
                    <input type="text" name="NoEmpleado" placeholder="NoEmpleado" value="'.$NoEmpleado.'">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                      <label for="">Nombre</label>
                      <input type="text" name="Nombre" placeholder="Nombre" value="'.$Nombre.'">
                  </div>
                  <div class="6u 12u$(mobile)">
                    <label for="">Apellido Paterno</label>
                  <input type="text" name="ApellidoPaterno" placeholder="ApellidoPaterno" value="'.$ApellidoPaterno.'">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                    <label for="">Apellido Materno</label>
                  <input type="text" name="ApellidoMaterno" placeholder="ApellidoMaterno" value="'.$ApellidoMaterno.'">
                  </div>


                  <div class="6u$ 12u$(mobile)">
                  <label for="">Puesto</label>
                    <input type="text" name="Puesto" placeholder="Puesto" value="'.$Puesto.'">
                  </div>
                  <div class="6u$ 12u$(mobile)">
                    <a href="EliminarResponsable.php?IdResponsable='.$IdResponsable.'">  <input type="button" value="Eliminar" style="color:red;" /></a>

                  </div>

                  <div class="12u$">
                    <input type="text" name="IdResponsable" value="'.$IdResponsable.'" style="display:none;">
                    <input type="submit" value="Guardar" />
                    <a href="app.php#Responsables">  <input type="button" value="Regresar" /></a>
                  </div>
                </div>
              </div>
            </form>
            ';

              break;

            case '4':

            $Mensaje = $_GET["MensajeResponsables"];
            $Bandera = $_GET["BanderaResponsables"];
            if ($Bandera == 1)
            {
              echo '<div class="alert alert-success" role="alert">
              <strong>Bien!!</strong> '.$Mensaje.'.
              </div>
              <div class="12u$">
                <a href="app.php#Responsables">  <input type="button" value="Regresar" /></a>
              </div>

              ';
            }
            else {

              echo '<div class="alert alert-warning" role="alert">
              <strong>Mal!!</strong> '.$Mensaje.'.
              </div>
              <div class="12u$">
                <a href="app.php#Responsables">  <input type="button" value="Regresar" /></a>
              </div>

              ';
            }


              break;

            default:


            echo '
            <section>
              <div class="row">
                <div class="12u 12u$(mobile)">
                  <!-- <a href="#" class="image fit"><img src="images/pic01.jpg" alt=""></a> -->
                  <table class="table table-striped">
                    <thead>
                      <tr>
                          <th>Mod</th>
                        <th>NoEmpleado</th>
                        <th>Nombre</th>
                        <th>Puesto</th>
                      </tr>
                    </thead>
                    <tbody>';

                          $sql = 'SELECT *,Concat(Nombre," ",ApellidoPaterno," ",ApellidoMaterno) As NombreCompleto FROM CatcResponsables Where Activo = 1';
                          $resultado = $conexion->query($sql);
                          while ($row = $resultado->fetch_assoc() )
                           {
                              echo '
                              <tr">
                                      <td><a href="app.php?AccionResponsables=2&IdResponsable='.$row["IdResponsable"].'#Responsables"><span class="icon fa-pencil"></span></a></td>
                                      <td>'.$row["NoEmpleado"].'</td>
                                      <td>'.$row["NombreCompleto"].'</td>
                                      <td>'.$row["Puesto"].'</td>
                                    </tr>
                                    ';
                              }

  echo '       </tbody>
                  </table>
                </div>
                <div class="12u 12u$(mobile)">
                <a href="app.php?AccionResponsables=1#Responsables">  <input type="button" name="" value="Agregar"></a>
                </div>

              </div>
            </section>';






              break;
          } // end switch







         ?>
			</article>


		</div>
		<div id="footer">
			<ul class="copyright">
				<li>Copyright. Design: Secretaría Administrativa - Facultad de Ingeniería </a></li>
			</ul>
		</div>
	</div>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/skel-viewport.min.js"></script>
	<script src="assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	<script src="assets/js/moment.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
</body>
</html>
<script type="text/javascript">
	$(function() {
		$('#datetimepicker1').datetimepicker({
			format: 'YYYY/MM/DD'
		});
		$('#datetimepicker2').datetimepicker({
			format: 'YYYY/MM/DD'
		});
		$('#datetimepicker3').datetimepicker({
			format: 'YYYY/MM/DD'
		});
		$('#datetimepicker4').datetimepicker({
			format: 'YYYY/MM/DD'
		});
	});
</script>
<?php

 mysqli_close($conexion);
 ?>
