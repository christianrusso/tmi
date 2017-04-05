<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        include_once('Database.php');
        $db = new Database();

        $id = htmlentities($_POST['idHistoriaActual']);
        $nombre = htmlentities($_POST['nombre']);
        $email = htmlentities($_POST['email']);
        $comentario = htmlentities($_POST['comentario']);
        $hoy = date("d/m/y"); 

        $query = "INSERT INTO comentarios(comentario, nombre, id_historia,email, fecha) VALUES ($comentario, $nombre, $id, $email, $hoy)";
        @mysqli_fetch_assoc($db->query($query));
        echo "<script>window.location='index.php';</script>";

    }
    
?>

            