<?php
  include_once("../Database.php");

  $idSponsor = $_GET['id'];
  $db = new Database();
  @mysqli_fetch_assoc($db->query("DELETE FROM sponsor WHERE id = '$idSponsor'"));

 

  echo "<script>window.location='lista_sponsor.php';</script>";
?>
