<?php
include_once("../Database.php");
$db = new Database();
$idHistoriaNueva = $_GET['id'];

$result = $db->query("SELECT * FROM historias where activa ='1'");
$historiaActual = mysqli_fetch_array($result);
$idHistoriaActual = $historiaActual['id'];
$acumuladoActual = $historiaActual['acumulado'];


//Apago historia actual
$query = "UPDATE historias SET activa='0', completada='1' WHERE id='$idHistoriaActual'";
echo $query;
$result = $db->query($query);
mysqli_fetch_array($result);

//Habilito nueva historia
$query = "UPDATE historias SET acumulado='$acumuladoActual', activa='1' WHERE id='$idHistoriaNueva'";
$result = $db->query($query);
mysqli_fetch_array($result);

echo "<script>window.location='lista_historia.php';</script>";

