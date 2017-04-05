<?php

  if(!$fbuser)
  {
    $fbuser = null;
    $loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));
    $output = '<div class="fb-login"><a href="'.$loginUrl.'"><img src="images/btn-facebook.svg"></a><br><p style="color: #E4251F; font-size: 13px;">*Necesitas estar logueado para poder hacer una donación</p></div>';  
  }
  else
  {
    $user_profile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
    $user = new Users();
    $user_data = $user->checkUser('facebook',$user_profile['id'],$user_profile['first_name'],$user_profile['last_name'],$user_profile['email'],$user_profile['gender'],$user_profile['locale'],$user_profile['picture']['data']['url']);
    if(!empty($user_data))
    {
      $output = '<div class="facebook-data"><h2>Perfil de Facebook</h2>';
      $output .= '<img src="'.$user_data['picture'].'">';
      $output .= '<br/><p><b>Nombre</b> : ' . $user_data['fname'].' '.$user_data['lname'];
      $output .= '<br/><b>Email</b> : ' . $user_data['email'];
      $output .= '<br/><a href="logout.php?logout">Salir de Facebook</a></div>'; 
    }
    else
    {
    $output = '<h3 style="color:red;">Ha ocurrido un problema. Por favor vuelve a intentarlo.</h3>';
    }
  }
  if(isset($_GET['h'])){
    $idHist = htmlentities($_GET['i']);
    $historiaActiva = mysqli_fetch_assoc($db->query("SELECT * FROM historias WHERE id=$idHist"));
  }
  $id = $historiaActiva['id'];
  $cantColaboradores = mysqli_fetch_assoc($db->query("SELECT count(*) AS cant FROM colaboradores WHERE id_historia=$id"));
?>

    <!-- Inicio historia -->
    <div class="contenedor-historia">

      <div class="container">

        <div class="col-md-8 historia">
          
          <p class="historia-titulo"><?php echo $historiaActiva['titulo'];?> </p>
          <p class="historia-subtitulo"><?php echo $historiaActiva['subtitulo'];?></p>
          
          <br>

          <iframe width="740" height="416" src="<?php echo $historiaActiva['url_video'];?>" allowfullscreen></iframe>

          <?php 
            $idHistoria = $historiaActiva['id'];
            $completada = $historiaActiva['completada'];
            $result = $db->query("SELECT * FROM imagen WHERE id_historia=$idHistoria");
            $imagen = mysqli_fetch_assoc($result);
            $ogImagen = "http://remerasybuzosjazmin.com.ar/".$imagen['path_img'];
          ?>

          <div id="fb-root"></div>
          <div class="fb-share-button" data-href="http://www.remerasybuzosjazmin.com.ar" data-layout="button_count" data-mobile-iframe="true"></div>
        </div>

        <div class="col-md-4 recaudar">
          <h3 class="title">Esta historia esta...</h3>
          <br/>
          <div class="progress">
              <?php
              //calculo del porcentaje
                $porc =  $historiaActiva['acumulado'] * 100 / $historiaActiva['monto'];
                if($porc < 100){
              ?>
                  <!-- Se debe setear "aria-valuenow" y el "width" del "style" en el valor actual. -->
                  <div class="progress-bar progress-bar-success progress-bar-striped active barra-progreso" role="progressbar" aria-valuenow="<?php echo $porc; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $porc; ?>%;">
                    <span><b><?php echo number_format($porc, 2, ",", "");; ?>% completada</b></span>
                  </div>
             <?php
               }else{
              ?>
                  <div class="progress-bar progress-bar-success progress-bar-striped active barra-progreso" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;">
                    <span><b>¡Cumplido!</b></span>
                  </div>
              <?php
               }
             ?>
          </div>

          <h2>Recaudado <i class="fa fa-usd money"></i><b class="money"><?php echo $historiaActiva['acumulado'];?></b></h2>
          <br/>
          <?php
            if($activo){
              if(($historiaActiva['dias_restantes'] != 0) && ($historiaActiva['completada'] == "0")){
          ?>
                <p><i class="fa fa-clock-o"></i> <b>Días restantes</b>: <?php echo $historiaActiva['dias_restantes'];?></p>
          <?php
              }else{
          ?>
                <p class="sin-tiempo"><i class="fa fa-clock-o"></i> <b>La historia ya finalizo</b></p>
          <?php
              }
            }
          ?>
          <p><i class="fa fa-usd money"></i> <b>Monto objetivo</b>: <i class="fa fa-usd money"></i><b class="money"><?php echo $historiaActiva['monto']; ?></b></p>
          <p><i class="fa fa-users"></i> <b>Colaboradores</b>: <?php echo $cantColaboradores['cant']; ?></p>
          <?php
          if($porc < 100){
              if($fbuser && $activo && !$completada){
          ?>

              <div class="more more2 centerbtn">
                <a href="#openModal" class="button-pipaluk button--inverted">¡Quiero colaborar con dinero!</a>
              </div>

              <div id="openModal" class="modalDialog">
                <div>
                  <a href="#close" title="Close" class="close">X</a>
                  <h3>Donación para la historia: <?php echo $historiaActiva['titulo'];?></h3>
                  <form id="form-donar" class="centerbtn" action="checkout.php" method="post">
                    <input type="hidden" id="id-historia" name="id-historia" value=<?php echo '"'.$historiaActiva['id'].'"';?> >
                    <input type="hidden" id="id-fb" name="id-fb" value=<?php echo '"'.$user_data['oauth_uid'].'"';?> >
                    <input type="hidden" id="titulo-historia" name="titulo-historia" value=<?php echo '"'.$historiaActiva['titulo'].'"';?> >
                    <input type="hidden" id="nombre" name="nombre" value=<?php echo '"'.$user_data['fname'].' '.$user_data['lname'].'"'; ?> >
                    
                    <div class="col-md-6 no-pad">
                      <label for="monto">Monto que desea donar:</label>
                    </div>
                    <div class="col-md-6 no-pad">
                      <input type="number" pattern="\d+" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" id="monto" name="monto">
                    </div>
                    <div class="more more2 centerbtn">
                      <a onclick="document.getElementById('form-donar').submit(); return false;" class="button-pipaluk button--inverted" value="Continuar">Continuar</a>
                    </div>
                  </form>
                </div>
              </div>

              <div class="more more2 centerbtn">
                <a href=<?php echo "contacto-historia.php?historia=".(str_replace(" ", "-", $historiaActiva['titulo'])); ?> class="button-pipaluk button--inverted"> ¡Quiero donar el objeto o servicio buscado! </a>
              </div>
          <?php
              echo $output;
            }else if($activo && !$fbuser){
              echo $output;
            }
          }
          ?>
        </div>

        <div class="clearfix"> </div>

      </div>

      <div class="spacer"></div>

      <div class="container">

        <!-- Tabs de la historia -->
        <ul class="nav nav-tabs nav-justified">
          <li class="active"><a href="#Detalle" data-toggle="tab"><b>Detalle</b></a></li>
          <li><a href="#Imagenes" data-toggle="tab"><b>Imágenes</b></a></li>
          <li><a href="#Colaboradores" data-toggle="tab"><b>Colaboradores</b></a></li>
          <li><a href="#Comentarios" data-toggle="tab"><b>Comentarios</b></a></li>
        </ul>

        <!-- Contenido de cada Tab de la historia -->
        <div class="tab-content">

          <!-- Tab 1 -->
          <div class="tab-pane fade in active" id="Detalle">
            <div class="texto-historia">

            <?php
            if(($pag != "Historias") && strlen($historiaActiva['detalle']) > 800){
              echo "<p>". substr($historiaActiva['detalle'], 0, 800). "</p>";
              echo "<a href='historia.php?i=".$historiaActiva['id']."&h=1'>Ver mas</a>";
            }else{
              echo "<p>". $historiaActiva['detalle']. "</p>";
            }
            ?>
            </div>
          </div>

          <!-- Tab 2 -->
          <div class="tab-pane fade" id="Imagenes">

            <!-- Inicio Carousel de imágenes -->
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
              <?php
                
                $result = $db->query("SELECT * FROM imagen WHERE id_historia=$idHistoria");
                $i = 1;
                while($fila = mysqli_fetch_array($result)){
                  if($i == 1)
                    $active = "active";
                  else
                    $active = "";
                  echo "<div class='item ".$active."'>";
                    echo "<img class='carousel-img' src='images_historias/".$fila['path_img']."' >";
                  echo "</div>";
                  $i = 2;
                }
              ?>
              </div>
             
              <!-- Controles -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
             <!-- Fin Carousel de imagenes -->
          </div>

          <!-- Tab 3 -->
          <div class="tab-pane fade" id="Colaboradores">
            <div class="text">
              
              <div class="col-md-12">
                <div class="team-grids">
                  <section class="main">
                    <ul class="ch-grid">
                        <?php
                        $idHistoriaActual = $historiaActiva['id'];
                        $result = $db->query("SELECT * FROM colaboradores WHERE id_historia = $idHistoriaActual ORDER BY id DESC ");
                        while($colaborador = mysqli_fetch_array($result)){
                          $style = "background: url(".$colaborador['path_img']."); background-size:cover; background-repeat: no-repeat; ";
                          ?>
                      <li>

                        <div class="ch-item" style="<?php echo $style; ?>">
                          <div class="ch-info">
                            <h3><?php echo $colaborador['nombre']. " " . $colaborador['apellido']; ?></h3>
                          </div>
                        </div>
                      </li>
                          <?php
                        }
                      ?>
                    </ul>
                  </section>
                </div>
              </div>    
            </div>
          </div>

          <!-- Tab 4 -->
          <div class="tab-pane fade" id="Comentarios">
            <div class="col-md-12 single-page-left">
              <div class="response">
                <?php
                  $result = $db->query("SELECT * FROM comentarios WHERE id_historia = $idHistoriaActual ORDER BY id_comentario DESC");
                  while($comentario = mysqli_fetch_array($result)){
                ?>
                <div class="media response-info">
                  <div class="media-left response-text-left">
                    <h5><a><?php echo $comentario['nombre']?></a></h5>
                  </div>
                  <div class="media-body response-text-right">
                    <p class="comentario"><?php echo $comentario['comentario']; ?></p>
                    <ul>
                      <li><?php echo $comentario['fecha']; ?></li>
                    </ul>
                    <div class="media response-info"></div>
                    <div class="clearfix"> </div>
                  </div>
                </div>  
                <?php
                  }
                ?> 
                <div class="col-md-2"></div>
                <?php
                  if($fbuser){
                ?>
                  <div class="coment-form col-md-8">
                    <h3>Deja un comentario</h3>
                    <form action="guardarComentario.php" method="POST">
                    <input type="hidden" name="idHistoriaActual" value="<?php echo $idHistoriaActual; ?>"></input>
                      <input type="text" name="nombre" value="<?php echo $user_data['fname'].' '.$user_data['lname']; ?> " readonly required="">
                      <input type="text" name="email" value="<?php echo $user_data['email']?>" readonly required="">
                      <textarea name="comentario" type="text"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Deja tu comentario...';}" required="">Deja tu comentario...</textarea>
                      <input type="submit" value="Envia tu comentario" >
                    </form>
                  </div>    
                <?php 
                echo $output;
                  }else{
                    echo $output;
                  }
                ?>
              </div>
            </div>
          </div>

        </div>

        <!-- Fin historia -->
      </div>

      <div class="spacer"></div>

    </div>