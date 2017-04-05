<?php

  $titulo = "Tu Minuto Importa - Donar";
  $pag = "Donar";
  include_once("include/header.php");
  include_once("include/navBar.php");

  $mp = new MP("4576145533284778", "yPlhiHYcXgihXicAZrWHBsa2VZwd27Vj");
  $mp->sandbox_mode(TRUE);

  $monto = 1.00;
  $tituloHistoria = "";
  $nombre = "";
  $idHistoria = 0;
  $tranID = 0;


  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $idHistoria = $_POST['id-historia'];
    $tituloHistoria = $_POST['titulo-historia'];
    $monto = (double)$_POST['monto'];
    $nombre = $_POST['nombre'];
    $idFb = $_POST['id-fb'];

    $query = "INSERT INTO transacciones(id_historia,monto,nombre) VALUES ($idHistoria, $monto, $nombre)";
    mysqli_fetch_assoc($db->query($query));
    $query = "SELECT max(id) as max FROM transacciones WHERE 1";
    $result = mysqli_fetch_assoc($db->query($query));
    $tranID = $result['max'];
  }

  $preference_data = array(
    "items" => array(
        array(
            "title" => "Donación TMI - $tituloHistoria",
            "currency_id" => "ARS",
            "category_id" => "Donación",
            "quantity" => 1,
            "unit_price" => $monto
        )
    ),
    "back_urls" => array(
          "success" => "http://www.remerasybuzosjazmin.com.ar/transaccion.php?id=$tranID&h=$idHistoria&p=$monto&n=$nombre&r=s&idfb=$idFb",
          "failure" => "http://www.remerasybuzosjazmin.com.ar/transaccion.php?id=$tranID&h=$idHistoria&p=$monto&n=$nombre&r=f&idfb=$idFb",
          "pending" => "http://www.remerasybuzosjazmin.com.ar/transaccion.php?id=$tranID&h=$idHistoria&p=$monto&n=$nombre&r=p&idfb=$idFb"
    ),
    "notification_url" => "http://www.remerasybuzosjazmin.com.ar/confirmarTransaccion.php?id=$tranID",
  );

  $preference = $mp->create_preference($preference_data);
?>


  <div class="donacion-form">
    <div class="container">
      <div class="contact-grids">

        <div class="col-md-6" style="margin-top: 120px;">
          <img src="images/gracias.jpg" class="img-responsive" />
        </div>

        <div class="col-md-6 contact-grid">
          <h3 class="title">Agradecemos su colaboración</h3>
          <p>Información de su donación:</p>

          <div>

            <label>Historia</label>
            <input type="text" onchange="check_form()" value=<?php echo '"'.$tituloHistoria.'"' ?> required name="historia" id="historia" disabled>

            <label>Monto a donar (en pesos argentinos)</label>
            <input type="text" onchange="check_form()" value=<?php echo '"'.$monto.'"' ?> required name="monto" id="monto" disabled>

            <label>Su nombre</label>
            <input type="text" onchange="check_form()" value=<?php echo '"'.$nombre.'"' ?> required name="nombre" id="nombre" disabled>

            <label>Acepto los <a href="#openModal">Términos y condiciones</a> al realizar mi donación.</label>
            <input type="checkbox" name="tyc" id="tyc" onclick="check_form()">

            <div id="openModal" class="modalDialog">
              <div>
                <a href="#close" title="Close" class="close">X</a>
                <h3>Términos y condiciones</h3>
              </div>
            </div>

            <div id="mercadopago-btn" class="centerbtn" hidden>
              <a href="<?php echo $preference["response"]["init_point"]; ?>" class='orange-tr-l-ov-arall' name="MP-Checkout">¡Realizar donación!</a>
              <script type="text/javascript">
                (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
              </script>
            </div>

            <script type="text/javascript">
              function check_form()
              {
                var historia = document.getElementById("historia");
                var monto =  document.getElementById("monto");
                var nombre =  document.getElementById("nombre");
                var tyc = document.getElementById("tyc");

                if (historia.value != "" && monto.value != "" && nombre.value != "" && tyc.checked)
                  document.getElementById("mercadopago-btn").removeAttribute("hidden");
                else
                  document.getElementById("mercadopago-btn").setAttribute("hidden", true);
              }
            </script>

          </div>
        </div>

        <div class="clearfix"> </div>

      </div>

    </div>
  </div>

<?php 
  include_once("include/footer.php");
?>