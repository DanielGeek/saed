<?php
    //index.php

    require_once("../class/db/db.php");
    session_start();
    
    if(!isset($_SESSION["type"]))
    {
     header("location:../admin.php");
    }


?>

   <!DOCTYPE html>
<html>
  <head>
    <title>Login - Responsive Admin Dashboard</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="description" content="Login - Responsive Admin Dashboard" />
    <meta name="keywords" content="Notifications, Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Wrapbootstrap, Bootstrap, bootstrap.gallery" />
    <meta name="author" content="Bootstrap Gallery" />
    
    <base href="../">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
    
    <link href="css/new.css" rel="stylesheet">
    <!-- Important. For Theming change primary-color variable in main.css  -->

    <link href="fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
    
    <!-- Data Tables -->
		<link rel="stylesheet" href="css/datatables/dataTables.bs.min.css">
		
    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

    <script>
      // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      // m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      // })(window,document,'script','http://www.google-analytics.com/analytics.js','ga');
      // ga('create', 'UA-40304444-1', 'iamsrinu.com');
      // ga('send', 'pageview');

    </script>
  </head>

  <body>

    <!-- Header Start -->
    <header>
      <a href="" class="logo">
        <img src="images/logo.png" alt="Logo"/ style="height:50px;">
      </a>
      <div class="pull-right">
        <ul id="mini-nav" class="clearfix">
          <li class="list-box user-profile">
            <a id="drop7" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="img/user5.png" alt="Bluemoon User"> -->
              <h5>  <?php echo $_SESSION['user_name'] ?></h5>
            </a>
            <ul class="dropdown-menu server-activity">
              <li>
                <a href="dashboard/edit_perfil/" style="color:black;"><p><i class="fa fa-cog text-info"></i>  Configurar cuenta</p></a>
              </li>
              <li>
                <div class="demo-btn-group clearfix">
                  <a href="logout.php"><button class="btn btn-danger">
                    Salir
                  </button></a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </header>
    <!-- Header End -->

    <!-- Main Container start -->
    <div class="dashboard-container">

      <div class="container">
        <div class="contenedor_ivr card">
          <!-- Top Nav Start -->
          <div id='cssmenu'>
            <ul>
              <!-- <li class=''>
                  <a href=''><i class="fa fa-dashboard"></i>Dashboard</a>
                  <ul>
                    <li><a href=''>Estadísticas</a></li>
                  </ul>
              </li> -->
              <li class='active'>
                <a href='#collapseCrearCampana' data-toggle="collapse" aria-expanded="false" aria-controls="collapseCrearCampana"><i class="fa fa-dashboard"></i>Dashboard</a>
                <ul>
                  
                  <!-- <li><a href='#collapseVerCampana' data-toggle="collapse" aria-expanded="false" aria-controls="collapseVerCampana">Crear Comentarios</a></li> -->
                  <li><a href='#collapseCrearCampana' data-toggle="collapse" aria-expanded="false" aria-controls="collapseCrearCampana">Ver Comentarios</a></li>
                  <li><a href='#collapseTwo' data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">Mis Télefonos</a></li>
                 
                </ul>
              </li>
              <!-- modulo config inicio -->
              <li class=''>
              <a href='dashboard/edit_perfil/'><i class="fa fa-dashboard"></i>Config</a>
              <ul>
                <li><a href='dashboard/edit_perfil/'>Editar Perfil</a></li>
              </ul>
            </li>
            <!-- modulo config fin -->
            </ul>
          </div>
          <!-- Top Nav End -->

          <!-- Sub Nav End -->
          <div class="sub-nav hidden-sm hidden-xs">
            <ul>
              <li><a href="#collapseCrearCampana" data-toggle="collapse" aria-expanded="false" aria-controls="collapseCrearCampana" class="heading">Dashboard</a></li>
              
              <!-- <li class="hidden-sm hidden-xs">
                <a href='#collapseVerCampana' data-toggle="collapse" aria-expanded="false" aria-controls="collapseVerCampana">Ver Campañas</a>
              </li> -->
              <li class="hidden-sm hidden-xs">
                <a href='#collapseCrearCampana' data-toggle="collapse" aria-expanded="false" aria-controls="collapseCrearCampana" >Ver Comentarios</a>
                <!-- agregar class="selected" al tag a para activar -->
              </li>
              <li class="hidden-sm hidden-xs">
                <a href='#collapseTwo' data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">Mis Télefonos</a>
              </li>
             
            </ul>
            <!-- <div class="custom-search hidden-sm hidden-xs">
              <input type="text" class="search-query" placeholder="Search here ...">
              <i class="fa fa-search"></i>
            </div> -->
          </div>
          <!-- Sub Nav End -->

          <!-- Dashboard Wrapper Start -->
          <div class="dashboard-wrapper">
            <!-- Row Start -->
            <div id="collapseCrearCampana" class="row gutter collapse in" aria-labelledby="collapseCrearCampana" data-parent="#accordion">
              <div class="col-lg-12 col-md-12">
                <div class="widget no-margin">
                  <div class="widget-header">
                    <div class="title">
                      Editar Comentarios
                    </div>
                    <span class="tools">
                      <i class="fa fa-cogs"></i>
                    </span>
                  </div>
                  <div class="widget-body">
                    <div class="row gutter">
                    
                      <?php include "tabla_comentarios.php"; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row Start -->
            <br>
            <!-- Row Start telefonos -->
             <div id="collapseTwo" class="row gutter collapse in" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="col-lg-12 col-md-12">
                <div class="widget no-margin">
                  <div class="widget-header">
                    <div class="title">
                      Editar telefonos
                    </div>
                    <span class="tools">
                      <i class="fa fa-cogs"></i>
                    </span>
                  </div>
                  <div class="widget-body">
                    <div class="row gutter">
                      <?php include "tabla_contacto.php"; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row End telefonos -->
          </div>
          <!-- Dashboard Wrapper End -->
      </div>
        <footer>
          <p>© Amarok 2013-18</p>
        </footer>

      </div>
    </div>
    <!-- Main Container end -->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.js"></script>

    <!-- Custom JS -->
    <script src="js/menu.js"></script>
    
    <script type="text/javascript">
      //ScrollUp
      $(function () {
        $.scrollUp({
          scrollName: 'scrollUp', // Element ID
          topDistance: '300', // Distance from top before showing element (px)
          topSpeed: 300, // Speed back to top (ms)
          animation: 'fade', // Fade, slide, none
          animationInSpeed: 400, // Animation in speed (ms)
          animationOutSpeed: 400, // Animation out speed (ms)
          scrollText: 'Top', // Text for element
          activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });
      });

      //Tooltip
      $('a').tooltip('hide');

      //Popover
      $('.popover-pop').popover('hide');

      //Dropdown
      $('.dropdown-toggle').dropdown();

    </script>
    <!--jQuery validate para validar formulario en el front-end-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script> -->
    
    <script src="js/jquery-validate1.17.0.js"></script>
    <!-- <script src="correo_webservice/js/insertCorreo.js" type="text/javascript"></script> -->

    <!-- Data Tables -->
		<script src="js/datatables/dataTables.min.js"></script>
		<script src="js/datatables/dataTables.bootstrap.min.js"></script>
		<!-- <script src="js/datatables/custom-datatables.js"></script> -->
    <!-- controlador para la tabla de comentarios -->
    <script src="js/controllerComentario/controllerComentarios.js"></script>

    <!-- controlador para la tabla de telefonos -->
   <script src="js/controllerTelefono/controllerTelefonos.js"></script>

  </body>
</html>