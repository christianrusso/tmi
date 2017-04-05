<?php
    include_once('include/header.php');
    include_once('../Database.php');
    $db = new Database();
    if($_SERVER['REQUEST_METHOD'] == "POST"){


        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $url_video = $_POST['url'];
        @$hoy = getdate();
        $fecha_carga = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
        $monto = $_POST['monto'];
        $detalle = $_POST['descripcion'];
        $query = "INSERT INTO historias(titulo, subtitulo, url_video, fecha_carga, monto, acumulado, detalle, dias_restantes) VALUES ('$titulo','$subtitulo','$url_video','$fecha_carga','$monto','0','$detalle', '7')";
        mysqli_fetch_assoc($db->query($query));


        $result = mysqli_fetch_assoc($db->query("SELECT max(id) as maximo FROM historias"));
        $idHistoria = $result['maximo'];


        $i = 1;
        while (!empty($_FILES['imagen_'.$i]))
        {
            $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
            $cad = "";
            for ($j = 0; $j < 12; $j++) {
                $cad .= substr($str, rand(0, 62), 1);
            }

            $tamano = $_FILES ['imagen_'.$i]['size'];
            $tamaño_max = "50000000000";
            if ($tamano < $tamaño_max) {
                $destino = '../images_historias';
                $sep = explode('image/', $_FILES['imagen_'.$i]["type"]);
                $tipo = $sep[1];
                $a = move_uploaded_file($_FILES['imagen_'.$i]['tmp_name'], $destino . '/' . $cad . '.' . $tipo);
                echo $destino;
                $nombre_img = $cad . '.' . $tipo;
                
            } else
                echo "El archivo supera el peso permitido.";
            @mysqli_fetch_assoc($db->query("INSERT INTO imagen(id_historia, path_img) VALUES ('$idHistoria','$nombre_img')"));
            $i++;
        }




    }
?>

            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="row">
                    <div class="col-md-3">
                    </div>
                        <div class="col-md-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-green-haze">
                                        <i class="icon-settings font-green-haze"></i>
                                        <span class="caption-subject bold uppercase"> Agregar nueva Historia </span>
                                    </div>
                                </div>
                                <?php 
                                if($_SERVER['REQUEST_METHOD'] == "POST"){ ?>
                                <div class="alert alert-success">
                                    <button class="close" data-close="alert"></button>
                                    <span> Historia creada correctamente. </span>
                                </div>
                                <?php } ?>
                                <div class="portlet-body form">
                                    <form role="form" class="form-horizontal" action="agregar_historia.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-2 control-label" for="form_control_1">Titulo</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" id="form_control_1" placeholder="Ingrese el titulo de la historia" name="titulo" required="required">
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-2 control-label" for="form_control_1">Subtitulo</label>
                                                <div class="col-md-10">
                                                    <input type="text" step="any" class="form-control" name="subtitulo" id="form_control_1" placeholder="Ingrese el subtitulo de la historia" required="required">
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-2 control-label" for="form_control_1">URL Video</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" id="form_control_1" placeholder="Ingrese la URL del video" name="url" required="required">
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-2 control-label" for="form_control_1">Monto</label>
                                                <div class="col-md-10">
                                                    <input type="number" class="form-control" id="form_control_1" placeholder="Ingrese el monto de la historia" name="monto" required="required">
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-7">Descripcion</label>
                                                <br>
                                                <br>
                                                
                                                <div class="col-md-12">
                                                    <textarea name="descripcion" rows="10" cols="72" style="resize: none;"></textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group form-md-line-input">
                                                <label class="col-md-2 control-label" for="form_control_1">Imagenes </label>
                                                <div class="col-md-10" id="lista-equipos">
                                                    <input type="file" class="form-control"  name="imagen_1" required="required"> 
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-offset-2 col-md-10" style="margin-top: 15px;">
                                                        <button type="button" class="btn blue" onclick="agregarEquipo()">Agregar otra imagen</button>
                                                    </div>
                                                </div>

                                                <script type="text/javascript">
                                                function agregarEquipo(){
                                                    if ( typeof agregarEquipo.i == 'undefined' )
                                                        agregarEquipo.i = 2;

                                                    var y = document.createElement("input");
                                                    y.setAttribute("type", "file");
                                                    y.setAttribute("class", "form-control")
                                                    y.setAttribute("placeholder", "Ingrese la imagen" + agregarEquipo.i);
                                                    y.setAttribute("name", "imagen_" + agregarEquipo.i);
                                                    y.setAttribute("required", "required");
                                                    document.getElementById("lista-equipos").appendChild(y);
                                                    agregarEquipo.i++;
                                                }
                                                </script>
                                            </div>

                                 
                                        </div>


                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-5 col-md-10">
                                                    <button type="submit" class="btn blue">Agregar Historia</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<?php
    include_once('include/footer.php');
?>