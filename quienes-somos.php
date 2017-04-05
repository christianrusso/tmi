<?php 
	$titulo = "Tu Minuto Importa - Quienes Somos";
	$pag = "QuienesSomos";
	include_once("include/header.php");
	include_once("include/navBar.php");
?>


	<!--about-->
	<div class="about">
		<div class="container" >
			<div class="spacer"></div>
			<div class="about-info">
				<div class="col-md-7 about-grids" >
					<div class="about-row">
						<div class="col-md-4 about-imgs">
							<img src="images/img1.jpg" alt="" class="img-responsive zoom-img"/>
						</div>
						<div class="col-md-4 about-imgs">
							<img src="images/img2.jpg" alt=""  class="img-responsive zoom-img"/>
						</div>
						<div class="col-md-4 about-imgs">
							<img src="images/img1.jpg" alt=""  class="img-responsive zoom-img"/>
						</div>
						<div class="clearfix"> </div>
					</div>
					<h4>Nuestro granito de arena</h4>
					<p>La sociedad argentina se caracteriza por su espíritu solidario y colaborativo. Inspirados en
					esa idea, pensamos un espacio para que aquellos que más lo necesitan puedan contar su
					historia, y así recibir la ayuda de quienes quieren y pueden convertirla en una historia feliz.
					Tu Minuto Importa es una fundación sin fines de lucro con un sistema de crowfunding pensada
					para ese fin. A través de su sitio web la organización difunde las historias que ha recopilado
					dandoles la oportunidad de hacerlas conocidas y permitir a las personas colaborar
					mediante aporte de dinero, objetos o brindando un servicio.
					De esta manera queremos aportar nuestro granito de arena a la sociedad y ser parte de la
					construcción de un futuro mejor para todos.</p>		
				</div>
				<div class="col-md-5 about-grids">
					<div class="pince">
						<div class="pince-left">
							<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
						</div>
						<div class="pince-right">
							<h4>¿Porque elegirnos? </h4>
							<p>Vero vulputate enim non justo posuere placerat. Phasellus eget mauris.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="pince">
						<div class="pince-left">
							<span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
						</div>
						<div class="pince-right">
							<h4>Nuestra Mision</h4>
							<p>Dero vulputate enim non justo posuere placerat. purus vel mauris.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="pince">
						<div class="pince-left">
							<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
						</div>
						<div class="pince-right">
							<h4>Nuestra Historia</h4>
							<p>Justo posuere placerat. Vero vulputate enim non  Phasellus eget mauris.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--//about-->

		<div class="container titulo-tmi">
			<hr>
			<h2>Testimonios</h2>
			<hr>
		</div>

	<!-- testimonials -->
	<div class="container" style="margin-bottom: 20px;">

		<div class="col-md-6">
			<img class="img-responsive" src="images/slid.jpg" />
		</div>

		<div class="col-md-6">

			<div class="testimonials">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<div class="testimonials-grid">
									<img src="images/quote.png" alt="quote" class="img-responsive" />
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
										sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
										Ut enim ad minim veniam sed do eiusmod.</p>
									<h5>John Doe,<span> Tempor</span></h5>
								</div>
							</li>
							<li>
								<div class="testimonials-grid">
									<img src="images/quote.png" alt=" " class="img-responsive" />
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
										sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
										Ut enim ad minim veniam sed do eiusmod.</p>
									<h5>Elit semper,<span> Veniam</span></h5>
								</div>
							</li>
							<li>
								<div class="testimonials-grid">
									<img src="images/quote.png" alt=" " class="img-responsive" />
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
										sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
										Ut enim ad minim veniam sed do eiusmod.</p>
									<h5>Daniel Nyari,<span> Enim </span></h5>
								</div>
							</li>
						</ul>
					</div>
				</section>
				<!--FlexSlider-->
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
				<!--End-slider-script-->
			</div>
		</div>
	</div>
	<!-- //testimonials -->

<?php 
	include_once("include/footer.php");
?>