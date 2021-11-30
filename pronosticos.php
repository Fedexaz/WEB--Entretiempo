<?php

date_default_timezone_set('America/Argentina/San_Juan');

require("./recursos/includes/header_p.php");

?>
<body style="background-color: green;">
	<div class="container-fluid caja-principal" style="overflow-y: scroll; position: fixed; ">
		<!-- todo sobre el futbol sanjuanino-->
		<a href="index.php"><img src="recursos/img/otros/logo.png" alt="logo" width="350px" class="img-fluid d-inline"></a>
		<h2 class="d-inline text-light" style="background-color: grey;">Pronósticos</h2>
		<!-- SECCIÓN UNO -->
		<div class="row border border-success p-2 mt-2">
			<div class="col-md-12">
				<h2 class="text-light"><i class="fas fa-table"></i> Tabla de posiciones:</h2>
				<a href="#" class="btn btn-success float-right">Ver todas las tablas</a>
			</div>
		</div>
		<!-- SECCIÓN DOS -->
		<div class="row border border-success p-2 mt-2">
			<div class="col-md-12">
				<h2 class="text-light"><i class="fas fa-table"></i> Tabla de posiciones:</h2>
				<a href="./resultados.php" class="btn btn-success float-right">Ver todas las tablas</a>
			</div>
		</div>
		<!-- SECCIÓN TRES-->
		<div class="row border border-success p-2 mt-2">
			<div class="col-md-12">
				<h2 class="text-light"><i class="far fa-newspaper"></i> Últimas noticias:</h2>
				<a href="#" class="btn btn-success float-right">Ver todas las noticias</a>
			</div>
		</div>
	</div>
	<div class="container-fluid fixed-bottom" style="position: fixed; height: 17%; border-top: 2px solid #28A745;">
		<nav class="navbar navbar-expand navbar-light" style="background-color: FFFFFF;">
			<ul class="navbar-nav mr-auto ml-auto">
				<li class="nav-item">
					<a id="resultadosPop" class="nav-link" href="./resultados.php" data-content="Resultados de todos los partidos." rel="popover" data-placement="top" data-original-title="Resultados" data-trigger="hover">
						<center>
							<i class="fas fa-poll-h icono" style="color:white;"></i>
							<br>
							<span class="texto-icono text-light">Result.</span>
						</center>
					</a>
				</li>
				<li class="nav-item">
					<a id="fechasPop" class="nav-link" href="./fechas.php" data-content="Fechas de todos los partidos." rel="popover" data-placement="top" data-original-title="Fechas" data-trigger="hover">
						<center>
							<i class="fas fa-clock icono" style="color:white;"></i>
							<br>
							<span class="texto-icono text-light">Fechas</span>
						</center>
					</a>
				</li>
				<li class="nav-item">
					<a id="inicioPop" class="nav-link" href="./index.php" data-content="Aquí verás noticias, pronósticos, fechas y más." rel="popover" data-placement="top" data-original-title="Inicio" data-trigger="hover">
						<center>
							<i class="fas fa-futbol icono" style="color:white;"></i>
							<br>
							<span class="texto-icono text-light">Inicio</span>
						</center>
					</a>
				</li>
				<li class="nav-item">
					<a id="pronosticosPop" class="nav-link" href="./pronosticos.php" data-content="¡Aquí podrás realizar pronósticos para conseguir puntos y podrás canjearlos por premios!" rel="popover" data-placement="top" data-original-title="Pronósticos" data-trigger="hover">
						<center>
							<i class="fas fa-dollar-sign icono-activo" style="color:white;"></i>
							<br>
							<span class="texto-icono-activo font-weight-bold text-light">Pron.</span>
						</center>
					</a>
				</li>
				<li class="nav-item">
					<a id="perfilPop" class="nav-link" href="./perfil.php" data-content="Aquí podrás revisar tu perfil en la página." rel="popover" data-placement="top" data-original-title="Perfil" data-trigger="hover">
						<center>
							<i class="fas fa-user-alt icono" style="color:white;"></i>
							<br>
							<span class="texto-icono text-light">Perfil</span>
						</center>
					</a>
				</li>
			</ul>
		</nav>
	</div>
	<?php require("./recursos/includes/footer_p.php"); ?>
</body>