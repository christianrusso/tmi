        <!--Inicio Navigation Bar -->
        <div class="top-nav">
          <nav>
            <div class="container">

              <div class="navbar-header logo">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>

                <!-- <h1><a href="index.html">Tu Minuto Importa</a></h1> -->
                <a href="index.php"><img src="images/TMI-logo.png" width="80px"></a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-right" style="text-align:center; color: #FFFFFF;">
                  <li>
                    <a href="index.php" class="link-kumya <?php if ($pag == "Inicio") echo "active" ?>">
                      <span><i class="fa fa-home" style="font-size: 25px"></i></span><br>
                      <span class="text-kumya" data-letters="Inicio"> Inicio</span>
                    </a>
                  </li>
                  <li>
                    <a href="quienes-somos.php" class="link-kumya <?php if ($pag == "QuienesSomos") echo "active" ?>">
                      <span><i class="fa fa-users" style="font-size: 25px"></i></span><br>
                      <span class="text-kumya" data-letters="Quienes somos">Quienes somos</span>
                    </a>
                  </li>
                  <li>
                    <a href="historias.php" class="link-kumya <?php if ($pag == "Historias") echo "active" ?>">
                      <span><i class="fa fa-newspaper-o" style="font-size: 25px"></i></span><br>
                      <span class="text-kumya" data-letters="Historias">Historias</span>
                    </a>
                  </li>
                  <li>
                    <a href="contacto.php" class="link-kumya <?php if ($pag == "Contacto") echo "active" ?>">
                      <span><i class="fa fa-envelope" style="font-size: 25px"></i></span><br>
                      <span class="text-kumya" data-letters="Contáctenos">Contacto</span>
                    </a>
                  </li>
                </ul> 
                <div class="clearfix"> </div>
              </div>

            </div>
          </nav>
        </div>  
        <!--Fin Navigation Bar -->