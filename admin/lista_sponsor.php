<?php
include_once("../Database.php");
$db = new Database();

$result = $db->query("SELECT * FROM sponsor");

include_once('include/header.php');
?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <h3 class="page-title"> 
                        Listado de Sponsors
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
                                                <th> Nombre  </th>
                                                <th> Imagen </th>
                                                <th> Eliminar </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                            while($fila = mysqli_fetch_array($result)){
                                                echo "<tr>";
                                                echo "<td>".$fila['id']."</td>";
                                                echo "<td>".$fila['nombre']."</td>";
                                                echo "<td><img width=150 src='../sponsors/".$fila['nombre_img']."'></td>";
                                                echo "<td><a onclick='eliminar_sponsor(".$fila['id'].")' href='#' ><span class='label label-sm label-warning'> Eliminar </span></a></td>";
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
        function eliminar_sponsor(v)
        {
            if (confirm("¿Esta seguro que desea eliminar el sponsor " + v + "?"))
            {
                window.location= 'eliminar_sponsor.php?id=' + v;
            }
        }
        </script>


<?php
include_once('include/footer.php');
?>