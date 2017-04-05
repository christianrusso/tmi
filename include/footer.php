

    <!-- Inicio Footer-->
    <div class="footer">
      <div class="container">

        <div class="col-md-9 footer-grids" style="text-align: center;">
        <!--  <h3>Sponsors</h3>
          <p>¡Se uno de nuestros patrocinadores!</p>
          <br/>
          <?php
            $result = $db->query("SELECT * FROM sponsor order by id desc limit 6");
            while($sponsor = mysqli_fetch_array($result)){
              echo "<img class='sponsor' src='sponsors/".$sponsor['nombre_img']."' >";
            }
          ?>   -->
        </div>  

        <div class="col-md-3 footer-grids">
          <h3>Redes Sociales</h3>
          <div class="footer-bottom">
            <a href="https://www.facebook.com/tuminutoimporta/"><span>Facebook</span></a>
            <a href="https://twitter.com/tuminutoimporta"><span>Twitter </span></a>
            
          </div>
        </div>

        <div class="clearfix"> </div>

        <div class="footer-copy">
          <p>© 2016 Tu Minuto Importa. Todos los derechos reservados</p>
        </div>

        <div class="orbit-logo">
          <a href="http://www.orbit.com.ar"><img src="images/logo-orbit.png" alt="Orbit Logo"></a>
        </div>

      </div>

    </div>
    <!-- Fin Footer-->


    <!-- JS -->
    
    <script src="js/prettySticky.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Inicio Smoth Scrolling-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
          $(".scroll").click(function(event){   
            event.preventDefault();
        
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
          });
        });
    </script>
    <!-- Fin Smoth Scrolling-->

  </body>
</html>