
<?php
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

	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>

<body>

	<!-- Wrapper-->
	<div id="wrapper">

		<!-- Nav -->
		<nav id="nav">
			<a href="app.php#me" class="icon fa-home active"><span>Home</span></a>
			<a href="#Viajes" class="icon fa-map-marker"><span>Viajes</span></a>
			<a href="#Autos" class="icon fa-car"><span>Autos</span></a>
			<a href="#Choferes" class="icon fa-users"><span>Choferes</span></a>
			<a href="#Calendario" class="icon fa-calendar"><span>Calendario</span></a>
			<a href="#Consultar" class="icon fa-search"><span>Consultar</span></a>

			<!-- <a href="#contact" class="icon fa-envelope"><span>Contact</span></a> -->
			<!-- <a href="#" class="icon fa-twitter"><span>Twitter</span></a> -->
		</nav>

		<!-- Main -->
		<div id="main">

			<!-- Me -->
			<article id="me" class="panel">
				<header>
					<h1>Control Vehicular</h1>
					<p>
						<form class="" action="index.html" method="post">

							<input type="submit" name="" value="Agregar">
							<input type="submit" name="" value="Consultar">
							<input type="submit" name="" value="Modificar">
							<input type="submit" name="" value="Calendario">



						</form>
					</p>
					<p>Opciones Principales</p>
				</header>
				<a href="#work" class="jumplink pic">
									<span class="arrow icon fa-chevron-right"><span>See my work</span></span>
									<img src="images/me.jpg" alt="" />
								</a>
			</article>

			<article id="Viajes" class="panel">
				<header>
					<h2>Viajes</h2>
				</header>
				<p>
					Seccion de muestra adición y modificacion de Viajes.
				</p>
				<section>
					<div class="row">
						<div class="12u 12u$(mobile)">
							<!-- <a href="#" class="image fit"><img src="images/pic01.jpg" alt=""></a> -->
							<table class="table table-striped">
								<thead>
									<tr>
											<th>Modificar</th>
										<th>Auto</th>
										<th>Chofer</th>
										<th>Fecha Inicial</th>
										<th>Fecha Final</th>
										<th>Destino</th>
										<th>Responsable</th>



									</tr>
								</thead>
								<tbody>

										<?php



											$sql = 'SELECT a.IdMovAutos,Concat(b.Linea," ",b.Modelo) As Auto, Concat(c.Nombre," ",c.ApellidoPaterno) As Chofer, a.FechaInicial ,a.FechaFinal, a.Destino, Concat(d.Nombre," ",d.ApellidoPaterno," ",d.ApellidoMaterno) As Responsable  FROM MovcAutos a INNER JOIN Autos b on a.IdAuto = b.IdAuto INNER JOIN CatcChoferes c on a.IdChofer = c.IdChofer INNER JOIN CatcResponsables d on a.IdResponsable = d.IdResponsable ';


											$resultado = $conexion->query($sql);

											while ($row = $resultado->fetch_assoc() )
											 {
												 	echo '

													<tr">
																	<td><a href="app.php?Accion=Modificar&Id='.$row["IdMovAutos"].'#Viajes"><span class="icon fa-pencil"></span></a></td>
																	<td>'.$row["Auto"].'</td>
																	<td>'.$row["Chofer"].'</td>
																	<td>'.$row["FechaInicial"].'</td>
																	<td>'.$row["FechaFinal"].'</td>
																	<td>'.$row["Destino"].'</td>
																	<td>'.$row["Responsable"].'</td>
																</tr>

																';
													}

										 ?>


								</tbody>
							</table>

						</div>
						<div class="12u 12u$(mobile)">
									<?php



									if (isset($_GET["Accion"]))
									{
										$Accion = $_GET["Accion"];
										$IdMovAutos = $_GET["Id"];
										switch ($Accion)
										{
											case 'Modificar':

												echo '<form action="ModificarViaje.php" method="post">
													<div>
														<div class="row">
															<div class="6u 12u$(mobile)">
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


															<input type="text" name="FechaInicial" placeholder="FechaInicial" value="'.$FechaInicial.'">


															</div>
															<div class="6u$ 12u$(mobile)">
															<input type="text" name="FechaFinal" placeholder="FechaFinal" value="'.$FechaFinal.'">


															</div>
															<div class="12u$">
																<input type="text" name="Destino" placeholder="Destino" value="'.$Destino.'" />
															</div>

															<div class="12u$">
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
															</div>
														</div>
													</div>
												</form>
												';



												break;

												case 'MostrarMensaje':
												$Mensaje = $_GET["Mensaje"];
												$Bandera = $_GET["Bandera"];

												if ($Bandera == 1)
												{

													echo '<div class="alert alert-success" role="alert">
													<strong>Bien!!</strong> '.$Mensaje.'.
													</div>';
												}
												else {

													echo '<div class="alert alert-warning" role="alert">
													<strong>Mal!!</strong> '.$Mensaje.'.
													</div>';
												}


													break;

											default:
												# code...
												break;
										}
									}

									else

									{
											echo "Seleccione una opcion";

									}


 										?>


						</div>
						<div class="12u 12u$(mobile)">
							<!-- <a href="#" class="image fit"><img src="images/pic02.jpg" alt=""></a> -->

<?php

	if (isset($_GET["Agregar"]) )
	{
	}

	else {
		echo '<a href="app.php?Agregar=1#Viajes">	<input type="button" name="" value="Agregar"></a>';

	}

 ?>
							<!-- <input type="button" name="" value="Modificar"> -->


						</div>
						<div class="12u 12u$(mobile)">
							<?php

									if ( isset($_GET["Agregar"]) )
									{
											if ($_GET["Agregar"] == 1 )
											 {

												//

								echo '	<form action="AgregarViaje.php" method="post">
													<div>
														<div class="row">
															<div class="6u 12u$(mobile)">
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

															<select class="" name="IdChofer">
															';

															echo '<option value="0" >Seleccione un Chofer</option>';

															$sql = 'SELECT *,Concat(Nombre," ",ApellidoPaterno) As Chofer  FROM CatcChoferes';


															$resultado = $conexion->query($sql);

															while ($row = $resultado->fetch_assoc() )
															 {

																echo '<option value="'.$row["IdChofer"].'" >'.$row["Chofer"].'</option>';

													}


													echo '		</select>

															</div>
															<div class="6u 12u$(mobile)">


															<input type="text" name="FechaInicial" id="datetimepicker1" placeholder="FechaInicial" value="">


															</div>
															<div class="6u$ 12u$(mobile)">
															<input type="text" name="FechaFinal" id="datetimepicker2" placeholder="FechaFinal" value="">


															</div>
															<div class="12u$">
																<input type="text" name="Destino" placeholder="Destino" value="" />
															</div>

															<div class="12u$">
																<select class="" name="IdResponsable"> ';
																echo '<option value="0" >Seleccione un Responsable</option>';


																		$sql = 'SELECT *,Concat(NoEmpleado,"  ",Nombre," ",ApellidoPaterno) As Responsable  FROM CatcResponsables';


																		$resultado = $conexion->query($sql);

																		while ($row = $resultado->fetch_assoc() )
																		 {

																			echo '<option value="'.$row["IdResponsable"].'" >'.$row["Responsable"].'</option>';

																}



														echo '	</select>
															</div>


															<div class="12u$">
																<input type="submit" value="Guardar" />
															</div>
														</div>
													</div>
												</form>';



											}

									}

							?>


						</div>

					</div>
				</section>
			</article>

			<article id="Autos" class="panel">
				<header>
					<h2>Autos</h2>
				</header>
				<p>
					Seccion de muestra y modificacion de Autos.
				</p>
				<section>
					<div class="row">
						<div class="12u 12u$(mobile)">
							<!-- <a href="#" class="image fit"><img src="images/pic01.jpg" alt=""></a> -->
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Firstname</th>
										<th>Lastname</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>John</td>
										<td>Doe</td>
										<td>john@example.com</td>
									</tr>
									<tr>
										<td>Mary</td>
										<td>Moe</td>
										<td>mary@example.com</td>
									</tr>
									<tr>
										<td>July</td>
										<td>Dooley</td>
										<td>july@example.com</td>
									</tr>
								</tbody>
							</table>

						</div>
						<div class="4u 12u$(mobile)">
							<!-- <a href="#" class="image fit"><img src="images/pic02.jpg" alt=""></a> -->

							<input type="button" name="" value="Agregar">
							<input type="button" name="" value="Modificar">


						</div>
						<!-- <div class="4u$ 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic03.jpg" alt=""></a>
										</div>
										<div class="4u 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic04.jpg" alt=""></a>
										</div>
										<div class="4u 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic05.jpg" alt=""></a>
										</div>
										<div class="4u$ 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic06.jpg" alt=""></a>
										</div>
										<div class="4u 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic07.jpg" alt=""></a>
										</div>
										<div class="4u 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic08.jpg" alt=""></a>
										</div>
										<div class="4u$ 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic09.jpg" alt=""></a>
										</div>
										<div class="4u 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic10.jpg" alt=""></a>
										</div>
										<div class="4u 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic11.jpg" alt=""></a>
										</div>
										<div class="4u$ 12u$(mobile)">
											<a href="#" class="image fit"><img src="images/pic12.jpg" alt=""></a>
										</div> -->
					</div>
				</section>
			</article>

			<!-- Work -->
			<article id="Choferes" class="panel">
				<header>
					<h2>Choferes</h2>
				</header>
				<p>
					Seccion de muestra y modificacion de choferes.
				</p>
				<section>
					<div class="row">
						<div class="12u 12u$(mobile)">
							<!-- <a href="#" class="image fit"><img src="images/pic01.jpg" alt=""></a> -->
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Firstname</th>
										<th>Lastname</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>John</td>
										<td>Doe</td>
										<td>john@example.com</td>
									</tr>
									<tr>
										<td>Mary</td>
										<td>Moe</td>
										<td>mary@example.com</td>
									</tr>
									<tr>
										<td>July</td>
										<td>Dooley</td>
										<td>july@example.com</td>
									</tr>
								</tbody>
							</table>

						</div>
						<div class="4u 12u$(mobile)">
							<!-- <a href="#" class="image fit"><img src="images/pic02.jpg" alt=""></a> -->

							<input type="button" name="" value="Agregar">
							<input type="button" name="" value="Modificar">


						</div>

					</div>
				</section>
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
							<!-- <a href="#" class="image fit"><img src="images/pic01.jpg" alt=""></a> -->
							<iframe src="Calendario.php" width="850px" height="750px"></iframe>
						</div>
						<div class="12u 12u$(mobile)">
							<!-- <a href="#" class="image fit"><img src="images/pic02.jpg" alt=""></a> -->

							<input type="button" name="" value="Refrescar">



						</div>

					</div>
				</section>
			</article>

			<!-- Contact -->
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

		</div>

		<!-- Footer -->
		<div id="footer">
			<ul class="copyright">
				<li>&copy; Untitled.</li>
				<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
			</ul>
		</div>

	</div>

	<!-- Scripts -->
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
