<?php

  include_once('Database.php');
  $db = new Database();

	$idTransaccion = $_GET['id'];
	$query = "SELECT * from transacciones where id= $idTransaccion";
	$result = mysqli_fetch_assoc($db->query($query));
	$monto = $result['monto'];
	$idHistoria = $result['id_historia'];
	//Sumo la plata a la historia
	$monto = $monto * 0,0495;
	$queryUpdate = "UPDATE historias SET acumulado =acumulado + $monto where id= $idHistoria";
	mysqli_fetch_assoc($db->query($queryUpdate));
	//Borro la transaccion
	$queryDelete = "DELETE FROM transacciones WHERE id=$idTransaccion";
	mysqli_fetch_assoc($db->query($queryDelete));
?>