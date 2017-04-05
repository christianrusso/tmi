<?php
include_once("../Database.php");
$db = new Database();

$result = $db->query("SELECT * FROM historias");

include_once('include/header.php');
?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <h3 class="page-title"> 
                        Listado de Historias
                    </h3>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Titulo  </th>
                                                <th> Subtitulo </th>
                                                <th> Fecha Cargada </th>
                                                <th> Monto </th>
                                                <th> Acumulado </th>
                                                <th> Activar </th>
                                                <th> Completar </th>
                                                <th> Eliminar </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                            while($fila = mysqli_fetch_array($result)){
                                                echo "<tr>";
                                                echo "<td>".$fila['id']."</td>";
                                                echo "<td>".$fila['titulo']."</td>";
                                                echo "<td>".$fila['subtitulo']."</td>";
                                                echo "<td>".$fila['fecha_carga']."</td>";
                                                echo "<td>".$fila['monto']."</td>";
                                                echo "<td>".$fila['acumulado']."</td>";
                                                if($fila['activa'] != 1)
                                                    echo "<td><a href='activar.php?id=".$fila['id']."' ><span class='label label-sm label-warning'> Activar </span></a></td>";
                                                else 
                                                    echo "<td></td>";
                                                if($fila['completada'] != 1)
                                                    echo "<td><a href='completar.php?id=".$fila['id']."&v=1' ><span class='label label-sm label-warning'> Completar </span></a></td>";
                                                else 
                                                    echo "<td><a href='completar.php?id=".$fila['id']."&v=0' ><span class='label label-sm label-warning'> Incompleta </span></a></td>";
                                                echo "<td><a onclick='eliminar_historia(".$fila['id'].")' href='#' ><span class='label label-sm label-warning'> Eliminar </span></a></td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>

        <script type="text/javascript">
        function eliminar_historia(v)
        {
            if (confirm("¿Esta seguro que desea eliminar la historia " + v + "?"))
            {
                window.location= 'eliminar_historia.php?id=' + v;
            }
        }
        </script>


<?php
include_once('include/footer.php');
?>