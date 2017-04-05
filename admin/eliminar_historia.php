<?php
  include_once("../Database.php");

  $idHistoria = $_GET['id'];
  $db = new Database();
  @mysqli_fetch_assoc($db->query("DELETE FROM historias WHERE id = '$idHistoria'"));

  echo "<script>window.location='lista_historia.php';</script>";
?>
