<?php
  $h = $_GET['historia'];

  $hidden = "hidden";

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $history = $_POST['history'];
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $telefono = $_POST['phone'];
    $msj = $_POST['message'];

    $para      = 'info@tuminutoimporta.com.ar';
    $titulo    = "Deseo ayudar con la historia: $history";
    $mensaje = "<html>
                  <head>
                    <title>Consulta desde www.tuminutoimporta.com.ar</title>
                  </head>
                  <body>
                  <p><strong>Consulta recibida desde</strong>: <a href='http://www.tuminutoimporta.com.ar'>www.tuminutoimporta.com.ar</a></p>
                  <p>
                    <span style='color:#627aac;'><span><strong>Historia con la que desea ayudar</strong></span></span>: $history <br />
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
    $resultEmail = mail($para, $titulo, $mensaje, $headers);

    if ($resultEmail)
      $hidden = "";
  }

  $titulo = "Tu Minuto Importa - Donación";
  $pag = "Donación";
  include_once("include/header.php");
  include_once("include/navBar.php");
?>

  <div class="contact">
    <div class="container">
      <div class="contact-grids">

        <div class="alert alert-success <?php echo $hidden; ?>">
         <button class="close" data-close="alert"></button>
         <span> Email enviado correctamente. </span>
        </div>

        <div class="col-md-6 contact-grid">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.0651318493074!2d-58.389941123596714!3d-34.60251449463183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccac0dd56f343%3A0x6b841e15a942cab6!2sTucum%C3%A1n+1673%2C+Cdad.+Aut%C3%B3noma+de+Buenos+Aires!5e0!3m2!1ses-419!2sar!4v1461761922352" allowfullscreen></iframe>
        </div>
        <div class="col-md-6 contact-grid">
          <h3 class="title">Donación</h3>
          <?php $h = str_replace("-", " ", $h); ?>
          <p>Utilice el siguiente formulario para ponerse en contacto con nosotros y definir como hacer llegar su ayuda para: <kbd><?php echo $h; ?></kbd>.</p>
          <form role="form" method="post" action="contacto-historia.php?historia=<?php echo $h; ?>">
            <input type="hidden" name="history" value=<?php echo '"'.$h.'"'; ?> >
            <input type="text" placeholder=<?php echo '"'.$h.'"'; ?> required disabled name="historia" style="margin-bottom: 15px;">
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