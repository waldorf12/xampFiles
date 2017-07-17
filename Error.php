<!DOCTYPE HTML>

<html>
	<head>
		<title>Vehiculos Ingenieria</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper-->
			<div id="wrapper">

				<!-- Nav -->
					<!-- <nav id="nav">
						<a href="#me" class="icon fa-home active"><span>Home</span></a>
						<a href="#work" class="icon fa-folder"><span>Work</span></a>
						<a href="#contact" class="icon fa-envelope"><span>Contact</span></a>
						<a href="#" class="icon fa-twitter"><span>Twitter</span></a>
					</nav> -->

				<!-- Main -->
					<div id="main">

						<!-- Me -->
							<!-- <article id="me" class="panel">
								<header>
									<h1>Acceso</h1>
									<p>Sistema Integral de Seguimiento Vehicular <br> Facultad de Ingeníeria</p>
								</header>
								<a href="#contact" class="jumplink pic">
									<span class="arrow icon fa-chevron-right"><span>See my work</span></span>
									<img src="images/me.jpg" alt="" />
								</a>
							</article> -->



						<!-- Contact -->
							<article id="contact" class="panel">
								<header>
									<h2>Error !</h2>
								</header>
								<form action="login.php" method="post">
									<div>
										<div class="row">
											<div class="6u 12u$(mobile)">
												<!-- <input type="text" name="username" placeholder="Usuario" /> -->
												<p>

													<?php
														if (isset($_GET["Mensaje"]))
														 {
															$Mensaje = $_GET["Mensaje"];

															echo '<div class="alert alert-info">
																'.$Mensaje.'
																		</div>
																		';
														}



													 ?>


												</p>
											</div>
											<!-- <div class="6u$ 12u$(mobile)">
												<input type="password" name="password" placeholder="Contraseña" />
											</div> -->
											<!-- <div class="12u$">
												<input type="text" name="subject" placeholder="Subject" />
											</div> -->
											<!-- <div class="12u$">
												<textarea name="message" placeholder="Message" rows="8"></textarea>
											</div> -->
											<div class="12u$">
												<a href="index.html">	<input type="button" value="Regresar" /></a>
											</div>
										</div>
									</div>
								</form>
							</article>

					</div>

				<!-- Footer -->
					<div id="footer">
						<ul class="copyright">
							<!-- <p class="copyright">&copy; Copyright. Design: Secretaría Administrativa - Facultad de Ingeniería </p> -->

							<li style="color:Black;">&copy; Copyright</li><li style="color:black;">Design: Secretaría Administrativa - Facultad de Ingeniería</a></li>
						</ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
