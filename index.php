<?php

date_default_timezone_set('America/Argentina/San_Juan');

require("./recursos/includes/header_p.php");

?> 
<body style="background-color: green;">
	<div class="container-fluid caja-principal" style="overflow-y: scroll; position: fixed; ">
		<!-- todo sobre el futbol sanjuanino-->
		<a href="index.php"><img src="recursos/img/otros/logo.png" alt="logo" width="350px" class="img-fluid d-inline"></a>
		<h2 class="d-inline text-light" style="background-color: grey;">Inicio</h2>
		<!-- SECCIÓN UNO -->
		<div class="row border border-success p-2 mt-2">
			<div class="col-md-12">
				<h2 class="text-light"><i class="far fa-calendar-alt"></i> Próximas fechas:</h2>
			</div>
			<div class="col-md-6">
				<table class="table table-bordered table-striped">
					<thead class="bg-light">
						<tr>
							<th colspan="3" class="text-danger"><i class="far fa-calendar-check"></i> <u>Hoy</u> - <?php $hoy = date("d/m/Y"); echo $hoy; ?></th>
						</tr>
						<tr class="text-center">
							<th scope="row"><i class="far fa-clock"></i><br>Hora</th>
							<th scope="row"><span>Local - Visitante</span></th>
							<th scope="row"><i class="fas fa-map-marker-alt"></i><br>Lugar</th>
						</tr>
					</thead>
					<tbody class="text-center bg-light">
						<?php 
						require("./basedatos/db.php");

						$conn = $mysqli->query("SELECT * FROM e_fechas WHERE fecha='".$hoy."' ORDER BY id DESC");

						if($conn->num_rows > 0)
						{
							while ($fila=$conn->fetch_assoc()) 
							{

								?>
								<tr>
									<th scope="row" class="bg-success text-light texto-icono"><?php echo $fila['hora']; ?></th>
									<td class="text-dark">
										<?php 
										$conn2 = $mysqli->query("SELECT nombre, abreviatura, escudo FROM e_equipos WHERE id='".$fila['id_local']."'");

										if($conn2->num_rows > 0)
										{
											while ($fila2=$conn2->fetch_assoc()) 
											{
												?>
												<a href="#" class="btn">
													<img src="<?php echo $fila2['escudo']; ?>" alt="<?php echo $fila2['nombre']; ?>" class="img-fluid" width="25px">
													<span style="font-size: 15px;">
														<?php echo $fila2['abreviatura']; ?>
													</span>
												</a>
												<?php 
											}
										}
										$conn3 = $mysqli->query("SELECT abreviatura, escudo FROM e_equipos WHERE id='".$fila['id_visitante']."'");

										if($conn3->num_rows > 0)
										{
											while ($fila3=$conn3->fetch_assoc()) 
											{

												?>
												<span style="font-size: 20px;">-</span>
												<a href="#" class="btn">
													<span>
														<?php echo $fila3['abreviatura']; ?>
													</span>
													<img src="<?php echo $fila3['escudo']; ?>" alt="<?php echo $fila3['nombre']; ?>" class="img-fluid" width="25px">
												</a>
												<?php 
											}
										} 
										?>
									</td>
									<th class="bg-success text-light texto-icono"><?php echo $fila['lugar']; ?></th>
								</tr>
								<?php
							} 
						}
						else echo "
						<tr>
						<td colspan='3'>
						<span class='text-danger font-weight-bold'>
						No hay partidos hoy...
						</span>
						</td>
						</tr>";
						?>
					</tbody>
				</table>
			</div>
			<div class="col-md-6">
				<table class="table table-bordered">
					<thead class="bg-light">
						<tr>
							<th colspan="3" class="text-danger">
								<i class="far fa-calendar-plus"></i> 
								<u>Mañana</u> - 
								<?php
								$tomorrow = new DateTime('tomorrow');
								echo $tomorrow->format('d/m/Y');
								?>
							</th>
						</tr>
						<tr class="text-center">
							<th scope="row"><i class="far fa-clock"></i><br>Hora</th>
							<th scope="row"><span>Local - Visitante</span></th>
							<th scope="row"><i class="fas fa-map-marker-alt"></i><br>Lugar</th>
						</tr>
					</thead>
					<tbody class="text-center bg-light">
						<?php 
						$conn4 = $mysqli->query("SELECT * FROM e_fechas WHERE fecha='".$tomorrow->format('d/m/Y')."' ORDER BY id DESC");

						if($conn4->num_rows > 0)
						{
							while ($fila4=$conn4->fetch_assoc()) 
							{

								?>
								<tr>
									<th scope="row" class="bg-success text-light texto-icono"><?php echo $fila4['hora']; ?></th>
									<td class="text-dark">
										<?php 
										$conn5 = $mysqli->query("SELECT nombre, abreviatura, escudo FROM e_equipos WHERE id='".$fila4['id_local']."'");

										if($conn5->num_rows > 0)
										{
											while ($fila5=$conn5->fetch_assoc()) 
											{
												?>
												<a href="#" class="btn">
													<img src="<?php echo $fila5['escudo']; ?>" alt="<?php echo $fila5['nombre']; ?>" class="img-fluid" width="25px">
													<span style="font-size: 15px;">
														<?php echo $fila5['abreviatura']; ?>
													</span>
												</a>
												<?php 
											}
										}
										$conn6 = $mysqli->query("SELECT abreviatura, escudo FROM e_equipos WHERE id='".$fila4['id_visitante']."'");

										if($conn6->num_rows > 0)
										{
											while ($fila6=$conn6->fetch_assoc()) 
											{

												?>
												<span style="font-size: 20px;">-</span>
												<a href="#" class="btn">
													<span>
														<?php echo $fila6['abreviatura']; ?>
													</span>
													<img src="<?php echo $fila6['escudo']; ?>" alt="<?php echo $fila6['nombre']; ?>" class="img-fluid" width="25px">
												</a>
												<?php 
											}
										} 
										?>
									</td>
									<th class="bg-success text-light texto-icono"><?php echo $fila4['lugar']; ?></th>
								</tr>
								<?php
							} 
						}
						else echo "
						<tr>
						<td colspan='3'>
						<span class='text-danger font-weight-bold'>
						No hay partidos mañana...
						</span>
						</td>
						</tr>";
						?>
					</tbody>
				</table>
				<a href="./fechas.php" class="btn btn-success float-right">Ver todas las fechas</a>
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
				<a href="./noticias.php" class="btn btn-success float-right">Ver todas las noticias</a>
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
							<i class="fas fa-futbol icono-activo" style="color:white;"></i>
							<br>
							<span class="texto-icono-activo font-weight-bold text-light">Inicio</span>
						</center>
					</a>
				</li>
				<li class="nav-item">
					<a id="pronosticosPop" class="nav-link" href="./pronosticos.php" data-content="¡Aquí podrás realizar pronósticos para conseguir puntos y podrás canjearlos por premios!" rel="popover" data-placement="top" data-original-title="Pronósticos" data-trigger="hover">
						<center>
							<i class="fas fa-dollar-sign icono" style="color:white;"></i>
							<br>
							<span class="texto-icono text-light">Pron.</span>
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
</html>