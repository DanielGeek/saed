<?php

require_once("class/db/db.php");
require_once("class/db/modelGetComentario.php");

?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Co - Servicio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Co - Servicio" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="GetTemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
	
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

	

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<!-- MODAL INICIO EQUIPOS -->
	<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog" id="mdialTamanio">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><center>Equipos de Frío y Calor</center></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
                <div class="modal-body">
                    <img width="100%" src="images/oferta.jpg"  />   
            </div>
                <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
            </div>
            </div>
        </div>
	</div>
	<!-- MODAL FIN EQUIPOS -->
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-3 col-xs-12">
					<div id="gtco-logo" class="gtco-logo">
						<a class="nav_a" href="#">
							<i class="fa fa-snowflake"></i>
							<!-- <img src="images/logo.png" alt=""> -->
					 		Co - Servicio<em>.</em>
					 </a>
					 </div>
				</div>
				<div class="col-xs-9 text-right menu-1">
					<ul>
						<li><a class="nav_a" href="#"><i class="fa fa-desktop" aria-hidden="true"></i> Cotizar En Linea</a></li>
						<li> <a style="padding-left:0px;" class="nav_a telefonos" href="#">Mesa Central :
							</a>
						</li>
						<li><a class="nav_a page-scroll" href="#ventas" ><i class="far fa-handshake" aria-hidden="true"></i> Ventas</a></li>
						<li><a class="nav_a page-scroll" href="#galeria"><i class="fa fa-camera" aria-hidden="true"></i> Galeria</a></li>
						<li><a class="nav_a page-scroll" href="#gtco-subscribe"><i class="fas fa-address-book"></i> Contacto</a></li>
						<li class="ingresar "><a class="nav_a" href="admin.php">Ingresar</a></li>
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_bg_2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<div class="row row-mt-15em">
						<div class="col-md-8 mt-text animate-box" data-animate-effect="fadeInUp">
							<!-- <h1>Garantía de Satisfacción</h1>	 -->
							<h1 class="">VENTA , INSTALACIÓN , MANTENCIÓN Y REPARACIÓN DE AIRE ACONDICIONADO</h1>
							<a href="#ventas" class="page-scroll " ><button class="btn btn-info"><i class="fas fa-dollar-sign"></i> VENTA</button></a> 
							<a href="#gtco-features" class="page-scroll" ><button class="btn btn-info"><i class="fas fa-truck"></i> INSTALACIÓN</button></a>
							<a href="#gtco-counter" class="page-scroll" ><button class="btn btn-info"><i class="fas fa-sync-alt"></i> MATENCIÓN</button></a>
							<a href="#ventas" class="page-scroll" ><button class="btn btn-danger"><i class="fas fa-calculator"></i> CALCULA TU AIRE</button></a>

						</div>
						
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							
							<div class="form-wrap">
								<div class="tab">
									
									<div class="tab-content">

										<div class="tab-content-inner active" data-content="signup">
											<h3>CLIENTES SATISFECHOS</h3>
												<marquee direction="up" scrolldelay="200">
													<ul class="ul-comentarios" style="">
														<?php 
															$comentario=new modelGetComentario();									
															$comentario=$comentario->getComentario();
															echo $comentario;
														?>
													</ul>
												</marquee>
											<center><button class="btn btn-danger" data-toggle="modal" data-target="#ingreseComentario">Ingrese Comentario</button></center>

										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Quienes somos inicio -->
	<div id="gtco-nosotros" class="gtco-section gtco-cover" role="banner" style="background-image: url(images/portfolio/item-9.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container" >
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>QUIENES SOMOS</h2>
					<p class="text-justify">Co-Servicios</p>
					<p class="text-justify">SOMOS UNA EMPRESA COMPROMETIDA CON LA ENTREGA DE UN SERVICIO DE CALIDAD, GARANTIZAMOS TODOS NUESTROS TRABAJOS Y EFECTUAMOS NUESTRAS EVALUACIONES Y PRIMERA MANTENCIÓN GRATIS.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Quienes somos fin -->
	
	<!-- inicio ventas -->
	<div id="ventas" class="gtco-section gtco-cover" role="banner" style="background-image: url(images/venta_bg.jpg)">
	<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>VENTA</h2>
					<p>Modelos Disponibles :</p>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-6 col-md-6 col-sm-6">
					<a href="images/portfolio/item-1.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/portfolio/item-1.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>9.000 BTU </h2>
							<p>R-410 H25,5 cm x W68 cm x D17,8 cm mm</p>
							<p><span class="btn btn-primary">Zoom</span></p>
						</div>
					</a>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<a href="images/portfolio/item-7.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/portfolio/item-7.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>12.000 BTU </h2>
							<p>R-410 H25,5 cm x W77 cm x D18,8 cm mm</p>
							<p><span class="btn btn-primary">Zoom</span></p>
						</div>
					</a>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<a href="images/portfolio/item-8.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/portfolio/item-8.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>18.000 BTU </h2>
							<p>R-410 H31,5 cm x W70 cm x D21,8 cm mm</p>
							<p><span class="btn btn-primary">Zoom</span></p>
						</div>
					</a>
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6">
					<a href="images/portfolio/item-9.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/portfolio/item-9.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>24.000 BTU </h2>
							<p>R-410 H31,5 cm x W103 cm x D21,8 cm mm</p>
							<p><span class="btn btn-primary">Zoom</span></p>
						</div>
					</a>
				</div>

			</div>
		</div>
	</div>
	<!-- fin ventas -->
	
<!-- inicio instalacion -->
<div id="gtco-features" class="gtco-section gtco-cover" role="banner" style="background-image: url(images/portfolio/item-8.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>INSTALACION</h2>
					<p class="text-justify">Disponemos de un equipo de profesionales altamente calificados para realizar instalaciones acordes al requerimiento de cada unidad familiar, comercial o industrial.</p>
					<p class="text-justify">Nuestro servicio post-venta posee para todos nuestros clientes:
						GARANTIA DE SATISFACCIÓN-PRIMERA MANTENCIÓN GRATIS
						El Objetivo de esta garantía y primera mantención, es obtener y Asegurar el correcto funcionamiento de su Aire Acondicionado. 
						También disponemos de un servicio técnico a través del servicio WhatsApp + 56 9 98711920 , y al e-mail: contacto@co-servicio.cl
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>1</i>
						</span>
						<h3>Garantía de Satisfacción</h3>
						<p>Paga al recepcionar conforme.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>2</i>
						</span>
						<h3>Cotización gratuita</h3>
						<p>para recomendar el mejor  aire  y servicio.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>3</i>
						</span>
						<h3>Mantención</h3>
						<p>1era mantención gratis.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- fin instalacion -->

	<!-- inicio galeria -->
	<div id="galeria" class="gtco-section gtco-cover" role="banner" style="background-image: url(images/portfolio/item-12.jpg)">
	<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Redes Sociales</h2>
				</div>
			</div>
			
			<!-- inicio div row imagenes -->
			<div id="instafeed" class="row gallery">
				
			</div>
			<button id="btn-instafeed-load" class="text-center btn btn-info btn-lg">Cargar más</button>
			<!-- fin divs row imagenes -->
		</div>
	</div>
	<!-- fin galeria -->
	
	

	<!-- <div class="gtco-cover gtco-cover-sm" style="background-image: url(images/img_bg_1.jpg)"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container text-center">
			<div class="display-t">
					<div id="instafeed"></div>
			</div>
		</div>
	</div> -->

	<div id="gtco-counter" class="gtco-section gtco-cover" role="banner" style="background-image: url(images/team.jpg)">
		<div class="overlay"></div>	
		<div class="gtco-container">	
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>MANTENIMIENTO, PARA AHORRAR Y EVITAR AVERÍAS</h2>
					<p class="text-justify">El último punto, importante y olvidado por muchos está en el mantenimiento adecuado, el cual debe realizarse siempre antes del primer uso prolongado en verano. En la unidad exterior hay que comprobar que no existen fugas de gases refrigerantes, obstrucciones que dificulten el paso de aire y limpiar el polvo de la rejilla con una brocha amplia. En la unidad interior, retirar los filtros para limpiarlos, las impurezas dificultan el rendimiento y producen malos olores. Para limpiarlos será suficiente jabón neutro y abundante agua. Igualmente habrá que limpiar también el tubo y la bandeja que recoge el agua y aplicar bactericidas en caso necesario. Por último hay que revisar el funcionamiento de los termostatos de control.Con todas estas comprobaciones y tareas de limpieza tendremos los equipos de aire acondicionado preparados para usar de forma eficiente y minimizando el consumo.</p>
				</div>
			</div>

			<div class="row">
				
				
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Clientes Empresa</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="12402" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Clientes Hogar</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="12202" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Cleintes Felices</span>

					</div>
                </div>
                <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="12202" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Cleintes Que nos Recomiendan</span>

					</div>
				</div>
					
			</div>
		</div>
	</div>

	

	<div id="gtco-subscribe" class="gtco-section gtco-cover" role="banner" style="background-image: url(images/contacto.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Contactanos</h2>
					<p></p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<span id="alert_cont2"></span>
					<form id="con_form2" class="form-inline">
						<!-- <div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Your Email">
							</div>
						</div> -->
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label for="con_email2" class="sr-only">Email</label>
								<input type="email" class="form-control" id="con_email2" name="con_email2" placeholder="Su Email" >
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label for="con_name2" class="sr-only">Nombre</label>
								<input type="text" class="form-control" id="con_name2" name="con_name2" placeholder="Su Nombre" >
							</div>
						</div>

						<div class="col-md-4 col-sm-4">
							<input type="submit" id="btn_submit2" name="btn_submit2" value="Enviar"  class="btn btn-default btn-block" />
						</div>
						<div class="col-md-12 col-sm-12">
							<div class="form-group">
								<label for="con_mensaje2" class="sr-only">Dejanos un comentario!</label>
                                <textarea  class="form-control" cols="40" rows="8" id="con_mensaje2" name="con_mensaje2" placeholder="Su Mensaje"></textarea>
							</div>
						</div>
						<!-- <div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Subscribe</button>
						</div> -->
					</form>
				</div>
			</div>
		</div>
	</div>

	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">

			<!-- <div class="row row-p	b-md">
				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>About Us</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eos molestias quod sint ipsum possimus temporibus officia iste perspiciatis consectetur in fugiat repudiandae cum. Totam cupiditate nostrum ut neque ab?</p>
					</div>
				</div>

				<div class="col-md-2 col-md-push-1">
					<div class="gtco-widget">
						<h3>Destination</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Europe</a></li>
							<li><a href="#">Australia</a></li>
							<li><a href="#">Asia</a></li>
							<li><a href="#">Canada</a></li>
							<li><a href="#">Dubai</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-2 col-md-push-1">
					<div class="gtco-widget">
						<h3>Hotels</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Luxe Hotel</a></li>
							<li><a href="#">Italy 5 Star hotel</a></li>
							<li><a href="#">Dubai Hotel</a></li>
							<li><a href="#">Deluxe Hotel</a></li>
							<li><a href="#">BoraBora Hotel</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-md-push-1">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> info@GetTemplates.co</a></li>
							<li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
						</ul>
					</div>
				</div>
			</div> -->

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; <?php echo date('Y'); ?> Co-Servicio.cl</small> 
						<small class="block">Diseñado por <a href="http://awaking.cl/" target="_blank">Awaking.cl</a>
						 <!-- Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a> -->
						</small>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="https://www.instagram.com/pruebaamarok/" target="_blank"><i class="icon-instagram"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	<!-- </div> -->

	</div>

    <!-- Modal -->
    <div class="modal fade" id="ingreseComentario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingrese Comentario | Felicitación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<span id="alert_cont"></span>
			<form id="con_form">
				<div class="form-group">
					<label for="con_name">Nombre / Empresa</label>
						<input type="text" class="form-control" id="nombre" name="con_name">
					</div>
					<div class="form-group">
						<label for="con_tel">Teléfono</label>
						<input type="tel" class="form-control" id="telefono" name="con_tel">
					</div>
					<div class="form-group">
						<label for="con_email">Email</label>
						<input type="email" class="form-control" id="email" name="con_email">
					</div>
					<div class="form-group">
						<label for="con_mensaje">Comentario | Felicitación</label>
						<textarea class="form-control" rows="5" id="comentario" name="con_mensaje"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="submit_comentario">Enviar</button>
				</div>
			</form>
            </div>
        </div>
	</div>
	<!-- fin modal -->
	
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
    <script src="js/jquery.min.js"></script>
	
	<!-- jquery validate -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
	
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	
	<!-- Escroll para el nav bar -->
	<script src="js/page-scroll.js"></script>
	
	<!-- sweetalert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- Data Tables -->
	<script src="js/datatables/dataTables.min.js"></script>
	<script src="js/datatables/dataTables.bootstrap.min.js"></script>
	<script src="js/datatables/custom-datatables.js"></script>
	
	<!-- Llamada para mostrar tel, ws, email activos -->
	<script src="js/controllerTelefono/controllerTelefonos.js" ></script>
	
	<!-- enviar comentario js -->
	<script src="js/controllerComentario/controllerInsertComentario.js" ></script>
	
	<!-- enviar mensaje Contacto -->
	<script src="js/controllerContacto/controllerContacto.js" ></script>
	
	
	<!-- Main -->
	<script src="js/main.js"></script>

	<!-- script para el navbar cambie color -->
	<script src="js/navbar.js"></script>
	
	<!-- para consumir API de instagram -->
	<script type="text/javascript" src="js/instagram/instafeed.min.js"></script>

	<!-- para Mostrar fotos con la API de instagram -->
	<script type="text/javascript" src="js/fotos_instagram.js"></script>


	<script>
		$(document).ready(function()
		{
			$("#mostrarmodal").modal("show");
		});
	</script>
	
	</body>
</html>

