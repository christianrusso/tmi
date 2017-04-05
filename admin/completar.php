<?php
include_once("../Database.php");
$db = new Database();
$idHistoriaActual = $_GET['id'];
$valor = $_GET['v'];


//Apago historia actual
$query = "UPDATE historias SET completada='$valor' WHERE id='$idHistoriaActual'";
$result = $db->query($query);
mysqli_fetch_array($result);


echo "<script>window.location='lista_historia.php';</script>";

