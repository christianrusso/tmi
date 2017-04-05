<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$nombre = $_POST['name'];
	    $email = $_POST['email'];
	    $telefono = $_POST['phone'];
	    $msj = $_POST['message'];

	    $para      = 'christian.russo8@gmail.com';
	    $titulo    = 'Historia enviada desde www.tuminutoimporta.com.ar';


	    $mensaje = "<html>
	                  <head>
	                    <title>Historia desde www.tuminutoimporta.com.ar</title>
	                  </head>
	                  <body>
	                  <p><strong>Historia recibida desde</strong>: <a href='http://www.tuminutoimporta.com.ar'>www.tuminutoimporta.com.ar</a></p>
	                  <p>
	                    <span style='color:#627aac;'><span><strong>Nombre y Apellido</strong></span></span>: $nombre <br />
	                    <span style='color:#627aac;'><strong>Email</strong></span>: $email <br />
	                    <span style='color:#627aac;'><strong>Tel&eacute;fono</strong></span>: $telefono <br />
	                    <span style='color:#627aac;'><strong>Mensaje</strong></span>: <em> $msj </em><br />
	                  </p>
	                </body>
	              </html>";

	    $headers = "From: TuMinutoImporta Web <no-reply@tuminutoimporta.com.ar> \r\n";
	    $headers .= "Reply-To: Ecosilman Web <no-reply@tuminutoimporta.com.ar> \r\n";
	    $headers .= "MIME-Version: 1.0\r\n";
	    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	    $result = mail($para, $titulo, $mensaje, $headers);
	}

	$titulo = "Tu Minuto Importa - Inicio";
  	include_once("include/header.php");
  	include_once("include/navBar.php");
	$historias = array();
	$result = $db->query("SELECT * FROM historias order by id desc");
	while($historia = mysqli_fetch_array($result)){
		$historias[] = $historia;
	}
?>

		<!-- Inicio primera sección -->
		<div class="spacer"></div>

		<div class="welcome bienvenido">
			<div class="container">

				<!-- Video explicativo -->
				<div class="col-md-6 welcome-left ">
					<div class="video-container"><iframe width="740" height="416" src="https://www.youtube.com/embed/BcdZm3WAF4A" allowfullscreen></iframe></div>
				</div>

				<div class="col-md-6 welcome-right" style="background: rgba(11, 11, 11, 0.55); border-radius: 20px; ">
					<h3 class="title">Sobre nuestra ONG</h3>
					<p>Explicación sobre el objetivo de <strong>Tu Minuto Importa</strong></p>
					<div class="welcome-info">
						<div class="col-md-2 welcome-text wtext-left">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 welcome-text wtext-right">
							<h4>Objetivo 1</h4>
							<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum </p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="welcome-info">
						<div class="col-md-2 welcome-text wtext-left">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 welcome-text wtext-right">
							<h4>Objetivo 2</h4>
							<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum </p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- Fin primera seccion-->


		<?php 
		$activo = true;
		include_once("include/historia.php"); ?>

		<div class="spacer"></div>


		<!--Inicio Ultimas tres historias -->
		<div class="slid">
			<div class="container">	
				<h3 class="title slid-titulo">Historias anteriores</h3>
				<div class="slid-row">
					<?php 
					if(!empty($historias[1])){
					?>
					<div class="col-md-4 slid-grids">
						<h4><?php echo $historias[1]['titulo'];?></h4>
						<h5><?php echo $historias[1]['subtitulo'];?></h5>
						<?php
						$idHistoria = $historias[1]['id'];
						$result = $db->query("SELECT * FROM imagen where id_historia='$idHistoria'");
	                  	$img = mysqli_fetch_array($result);

						?>
						<img src="images_historias/<?php echo $img['path_img']; ?>" alt="...">
						<div class="more more3">
							<a href="historia.php?id=<?php echo $idHistoria; ?>" class="button-pipaluk button--inverted"> Leer Más</a>
						</div>	
					</div>
					<?php
					}
					if(!empty($historias[2])){
					?>
					<div class="col-md-4 slid-grids">
						<h4><?php echo $historias[2]['titulo'];?></h4>
						<h5><?php echo $historias[2]['subtitulo'];?></h5>
						<?php
						$idHistoria = $historias[2]['id'];
						$result = $db->query("SELECT * FROM imagen where id_historia='$idHistoria'");
	                  	$img = mysqli_fetch_array($result);

						?>
						<img src="images_historias/<?php echo $img['path_img']; ?>" alt="...">
						<div class="more more3">
							<a href="historia.php?id=<?php echo $idHistoria; ?>" class="button-pipaluk button--inverted"> Leer Más</a>
						</div>	
					</div>
					<?php
					}
					if(!empty($historias[3])){
					?>
					<div class="col-md-4 slid-grids">
						<h4><?php echo $historias[3]['titulo'];?></h4>
						<h5><?php echo $historias[3]['subtitulo'];?></h5>
						<?php
						$idHistoria = $historias[3]['id'];
						$result = $db->query("SELECT * FROM imagen where id_historia='$idHistoria'");
	                  	$img = mysqli_fetch_array($result);

						?>
						<img src="images_historias/<?php echo $img['path_img']; ?>" alt="...">
						<div class="more more3">
							<a href="historia.php?id=<?php echo $idHistoria; ?>" class="button-pipaluk button--inverted"> Leer Más</a>
						</div>	
					</div>
					<?php
					}
					?>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- Fin Ultimas tres historias -->


		<div class="container contacto-home">
			<div class="row">
				<h2>¡Contanos tu historia!</h2>
			</div>
			<hr>
			<div class="col-md-6">
					<img src="images/compartir-historia.png" alt="Compartir tu historia" class="responsive-image">
			</div>
			<div class="col-md-6">
				<h3>Utiliza el siguiente formulario para contactarnos</h3>
				<br>
				<form class="form-horizontal" role="form" method="post" action="index.php">
			    <div class="form-group">
			        <div class="col-sm-12">
			            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre y apellido" value="" required="required">
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-sm-12">
			            <input type="email" class="form-control" id="email" name="email" placeholder="Dirección de email" value="" required="required">
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-sm-12">
			            <input type="number" min="0" class="form-control" id="phone" name="phone" placeholder="Teléfono de contacto" value="" required="required">
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-sm-12">
			            <textarea class="form-control" rows="8" name="message" placeholder="Escriba aqui su historia."></textarea>
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-sm-12">
			            <input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-primary">
			        </div>
			    </div>
				</form>
			</div>
		</div>

<?php 
	include_once("include/footer.php");
?>