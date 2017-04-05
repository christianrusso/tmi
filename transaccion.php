<?php
    
    include_once('Database.php');
    $db = new Database();
    $tranID = $_GET['id'];
    $idFb = $_GET['idfb'];

    $queryColaborador = "SELECT * from users where oauth_uid = $idFb";
    $resultColaborador = mysqli_fetch_assoc($db->query($queryColaborador));
    $idHistoria = $_GET['h'];
    $nombre = $resultColaborador['fname'];
    $apellio = $resultColaborador['lname'];
    $img = $resultColaborador['picture'];
    
    $queryColaborador = "INSERT INTO colaboradores(nombre,apellido,id_historia,path_img) VALUES ($nombre, $apellido, $idHistoria, $img)";
    mysqli_fetch_assoc($db->query($queryColaborador));
    
    $monto = $_GET['p'];
    $nombre = $_GET['n'];
    $resultado = $_GET['r'];
    $query = "SELECT count(*) as cant from transacciones where id = $tranID and id_historia = $idHistoria and monto = $monto and nombre= $nombre";

    $result = mysqli_fetch_assoc($db->query($query));

        if($result['cant'] >= 1){
            if($resultado == "s"){
            	//Sumo la plata a la historia
            	$queryUpdate = "UPDATE historias SET acumulado =acumulado + $monto where id= $idHistoria";
            	mysqli_fetch_assoc($db->query($queryUpdate));
            	//Borro la transaccion
            	$queryDelete = "DELETE FROM transacciones WHERE id=$tranID";
            	mysqli_fetch_assoc($db->query($queryDelete));
            }else if ($resultado == "f"){
            	$queryDelete = "DELETE FROM transacciones WHERE id=$tranID";
            	mysqli_fetch_assoc($db->query($queryDelete));
            }else{
            	echo "Pendiente";
            }
        }else{
            echo "No existe la transacción.";
        }
?>