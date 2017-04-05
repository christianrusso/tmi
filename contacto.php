<?php
	
	$hidden = "hidden";

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$nombre = $_POST['name'];
    $email = $_POST['email'];
    $telefono = $_POST['phone'];
    $msj = $_POST['message'];

    $para      = 'info@tuminutoimporta.com.ar';
    $titulo    = 'Consulta enviada desde www.tuminutoimporta.com.ar';


    $mensaje = "<html>
                  <head>
                    <title>Consulta desde www.tuminutoimporta.com.ar</title>
                  </head>
                  <body>
                  <p><strong>Consulta recibida desde</strong>: <a href='http://www.tuminutoimporta.com.ar'>www.tuminutoimporta.com.ar</a></p>
                  <p>
                    <span style='color:#627aac;'><span><strong>Nombre y Apellido</strong></span></span>: $nombre <br />
                    <span style='color:#627aac;'><strong>Email</strong></span>: $email <br />
                    <span style='color:#627aac;'><strong>Tel&eacute;fono</strong></span>: $telefono <br />
                    <span style='color:#627aac;'><strong>Mensaje</strong></span>: <em> $msj </em><br />
                  </p>
                </body>
              </html>";

    $headers = "From: Tu Minuto Importa <no-reply@tuminutoimporta.com.ar> \r\n";
    $headers .= "Reply-To: Tu Minuto Importa <no-reply@tuminutoimporta.com.ar> \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $result = mail($para, $titulo, $mensaje, $headers);

    if($result)
    	$hidden = "";
	}

	$titulo = "Tu Minuto Importa - Contacto";
	$pag = "Contacto";
	include_once("include/header.php");
	include_once("include/navBar.php");
?>


	<div class="contact">
		<div class="container">
			<div class="contact-grids">
				<div class="col-md-6 contact-grid">
				  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.0651318493074!2d-58.389941123596714!3d-34.60251449463183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccac0dd56f343%3A0x6b841e15a942cab6!2sTucum%C3%A1n+1673%2C+Cdad.+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses-419!2sar!4v1461761922352" allowfullscreen></iframe>
        </div>
				<div class="col-md-6 contact-grid">
					<div class="titulo-tmi">
						<hr>
						<h2>Contacto</h2>
						<hr>
					</div>
					<br>
					<div class="alert alert-success <?php echo $hidden; ?>">
                       <button class="close" data-close="alert"></button>
                       <span> Email enviado correctamente. </span>
                  </div>
					<form role="form" method="post" action="contacto.php">
						<input type="text" placeholder="Nombre" required name="name">
						<input type="email" class="input-mdl" placeholder="Email" name="email" required>
						<input type="number" placeholder="Telefono" required name="phone">
						<textarea type="text" required name="message" placeholder="Su mensaje"></textarea>
						<input type="submit" value="Enviar mensaje" >
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="address">
				<ul>
					<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Tucuman 1673 – 6° piso of. 13 – CP 1050</li>
					<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@tuminutoimporta.com.ar"> info@tuminutoimporta.com.ar</a></li>
				</ul>
			</div>

		</div>
	</div>
	<!-- //contact -->
	<?php 
	include_once("include/footer.php");
?>