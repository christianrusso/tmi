<?php
	$titulo = "Tu Minuto Importa - Historias";
	$pag = "Historias";
	include_once("include/header.php");
	include_once("include/navBar.php");
	$result = $db->query("SELECT * FROM historias where activa != 1 order by id desc");
                  
                  
?>
	<div class="gallery">		
		<div class="container">
			<div class="spacer"></div>
			<div class="spacer"></div>

			<div class="container titulo-tmi">
				<hr>
				<h2>Historias pasadas</h2>
				<hr>
			</div>
			
			<div class="gallery-grids">		
				<?php
				while($hist = mysqli_fetch_array($result)){
					$idHistoria = $hist['id'];
					$resultIMG = $db->query("SELECT * FROM imagen where id_historia=$idHistoria");
	                $img = mysqli_fetch_array($resultIMG);
				?>		
				<div class="col-md-4 port-grids view view-tenth">
					<a href="historia.php?i=<?php echo $hist['id']; ?>&h=1" >
						<img src="images_historias/<?php echo $img['path_img']; ?>" class="img-responsive" alt=""/>
						<div class="mask">
							<h2><?php echo $hist['titulo']; ?></h2>
							<p><?php echo $hist['subtitulo']; ?></p>
						</div>
					</a>
				</div>
				<?php
				}
				?>	
				<div class="clearfix"> </div>	
				<script src="js/lightbox-plus-jquery.min.js"> </script>
			</div>	
					
		</div>
	</div>	
	<!--//gallery-->
		<?php 
	include_once("include/footer.php");
?>