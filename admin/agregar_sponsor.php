<?php
    include_once('include/header.php');
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        include_once('../Database.php');
        $db = new Database();

        $nombre = $_POST['nombre'];

        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $cad = "";
        for ($i = 0; $i < 12; $i++) {
            $cad .= substr($str, rand(0, 62), 1);
        }

        $tamano = $_FILES ['imagen']['size'];
        $tamaño_max = "50000000000";
        if ($tamano < $tamaño_max) {
            $destino = '../sponsors';
            $sep = explode('image/', $_FILES["imagen"]["type"]);
            $tipo = $sep[1];
            $a = move_uploaded_file($_FILES['imagen']['tmp_name'], $destino . '/' . $cad . '.' . $tipo);
            echo $destino;
            $nombre_img = $cad . '.' . $tipo;
            
        } else
            echo "El archivo supera el peso permitido.";


        $query = "INSERT INTO sponsor(nombre, nombre_img) VALUES ('$nombre', '$nombre_img')";
        mysqli_fetch_assoc($db->query($query));
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
                                        <span class="caption-subject bold uppercase"> Agregar nuevo Sponsor </span>
                                    </div>
                                </div>
                                <?php 
                                if($_SERVER['REQUEST_METHOD'] == "POST"){ ?>
                                <div class="alert alert-success">
                                    <button class="close" data-close="alert"></button>
                                    <span> Sponsor creada correctamente. </span>
                                </div>
                                <?php } ?>
                                <div class="portlet-body form">
                                    <form role="form" class="form-horizontal" action="agregar_sponsor.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-2 control-label" for="form_control_1">Nombre</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" id="form_control_1" placeholder="Ingrese el nombre del sponsor" name="nombre" required="required">
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <center>
                                            <div class="fileinput fileinput-new " data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 320px; height: 240px;">
                                                  <img src="../images/no-foto.png" alt="" />
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 240px;"> </div>
                                                <div>
                                                  <span class="btn default btn-file">
                                                    <span class="fileinput-new btn blue"> Seleccionar foto </span>
                                                    <span class="fileinput-exists btn blue"> Cambiar </span>
                                                    <input type="file" name="imagen"> 
                                                  </span>
                                                  <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remover </a>
                                                </div>
                                              </div>
                                              <div class="clearfix margin-top-10"> </div>
                                        </div>
                                        </center>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-4 col-md-10">
                                                    <button type="submit" class="btn blue">Agregar Sponsor</button>
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