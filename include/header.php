<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once("Database.php");
    include_once("include/mercadopago.php");
    include_once("config.php");
    include_once("include/functions.php");

    $db = new Database();
    header('Content-Type: text/html; charset=utf-8');
    
    $OGimagen = "http://remerasybuzosjazmin.com.ar/images/TMI-logo.png";
    $OGtitulo = "Tu Minuto Importa";
    $OGdescripcion = "ONG de crowfunding";
    $OGid = -1; 

    if (isset($_GET['h']) && isset($_GET['i']))
    {
      $OGid = htmlentities($_GET['i']);
      $OGid = $db->real_escape_string($OGid);
      $OGhistoriaActiva = mysqli_fetch_assoc($db->query("SELECT * FROM historias WHERE id=$OGid"));
    }
    else
    {
      $OGresult = $db->query("SELECT * FROM historias ORDER BY id DESC"); 

      while ($OGhistoria = mysqli_fetch_array($OGresult))
        if ($OGhistoria['activa'] == 1)
          $OGhistoriaActiva = $OGhistoria;

      $OGid = $OGhistoriaActiva['id'];
    }

    $OGimagen = mysqli_fetch_assoc($db->query("SELECT * FROM imagen WHERE id_historia=$OGid LIMIT 1"));
    $OGtitulo = $OGhistoriaActiva['titulo'];
    $OGdescripcion = $OGhistoriaActiva['subtitulo'];
    $OGserver = 'http://www.tuminutoimporta.com.ar';
    $OGimgpath = $OGserver . '/images_historias/' . $OGimagen['path_img'];
?>

<!DOCTYPE html>
<html lang="es">

  <head>

    <!-- Titulo de la pagina -->
    <title><?php echo $titulo; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Tu Minuto Importa, ONG" />
    <meta property="og:url" content=<?php echo '"'.$OGserver.'"'; ?> />
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content=<?php echo '"'.$OGtitulo.'"'; ?> /> 
    <meta property="og:description" content=<?php echo '"'.$OGdescripcion.'"'; ?> /> 
  
    <meta property="og:image" content=<?php echo '"'.$OGimgpath.'"'; ?> />
    <meta property="og:image:secure_url" content=<?php echo '"'.$OGimgpath.'"'; ?> />
     
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!--CSS -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/prettySticky.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/main.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/font-awesome.min.css" type="text/css" rel="stylesheet" media="all">
    <link rel="shortcut icon" href="images/TMI-logo.png" /> 
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    <script src="js/jquery-1.11.1.min.js"></script> 

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){     
                event.preventDefault();
        
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>

    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6&appId=1600375700280688";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    
    <script data-cfasync="false">
      (function(r,e,E,m,b){E[r]=E[r]||{};E[r][b]=E[r][b]||function(){
      (E[r].q=E[r].q||[]).push(arguments)};b=m.getElementsByTagName(e)[0];m=m.createElement(e);
      m.async=1;m.src=("file:"==location.protocol?"https:":"")+"//s.reembed.com/G-AoyV0n.js";
      b.parentNode.insertBefore(m,b)})("reEmbed","script",window,document,"api");
    </script>
    
    

  </head>