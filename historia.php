<?php
	$titulo = "Tu Minuto Importa - Historia";
	$pag = "Historias";
	include_once("include/header.php");
	include_once("include/navBar.php");
?>

	<div class="spacer"></div>

	<!--about-->
	<div>
		<div class="container" >
			<?php 
				$id = $_GET['i'];
				$historias = array();
				$result = $db->query("SELECT * FROM historias where id = $id");
				while($historia = mysqli_fetch_array($result)){
					$historias[] = $historia;
				}
				$activo = false;
			include_once("include/historia.php"); 
			?>
		</div>
	</div>
	<!--//about-->
	
<?php 
	include_once("include/footer.php");
?>