<?php
      include_once("../conexion.php");
      session_start();


      if(isset($_SESSION['id_tipo_usuario']) && $_SESSION['id_tipo_usuario']==1)
      {
  ?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
   <!--
    Cuando este lista, cambiar favicon y descomentarlo
   <link rel="icon" href="../../favicon.ico"> -->
    <title>Uman</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
    <link href="../css/indexEst.css" rel="stylesheet">
    <!-- Custom style for navbar -->
    <link href="../css/navbar-fixed-top.css" rel="stylesheet">
    <!-- FONTS-->
	 <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="recargaPantalla.js"></script>
    <script type="text/javascript">
     function updateValue(fecha)
      {
        element = document.getElementById(fecha);

        if (element.checked)
          {
            element.value="1";
          }
        else
          {
            element.value="0";
          }
      }
    </script>
  </head>
  <body style="min-height: 100px !important; ">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" >
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Uman Menú</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active" id="navHome"><a href="index.php">Inicio</a></li>
            <li id="navHabDia"><a href="#">Habilitar días</a></li>
            <li id="navHabMenu"><a href="#">Habilitar menues</a></li>
            <li id="navABMPedidos"><a href="#">ABM pedidos</a></li>
            <li id="navABMMenu"><a href="#">ABM menues</a></li>
            <li id="navABMUser"><a href="#">ABM usuarios</a></li>
            <li id="navListMenu"><a href="#">Listado de pedidos</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <li id="navLogOut"><a href="LogOut.php">Cerrar Sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	 <div class="container" id="central">
     <h1 style="text-align:center">INICIO</h3><br>

     <p>Bienvenido al sistema de gestión y registro de pedidos.</p>

     <p>Este sistema le permitirá gestionar de forma integral usuarios, pedidos, menús, días de pedidos vigentes. Podrá consultarlos y modificarlos online, así como limitar los días habilitados para realizar pedidos por parte de los estudiantes.</p>

     <p> La barra de navegación de la sección superior de la pantalla lo ayudará a acceder a cada una de las funcionalidades descriptas anteriormente, de manera similar en la sección inferior de la pantalla podrá encontrar un enlace al "mapa del sitio" donde se listan cada una de las secciones a las que podrá acceder en detalle y la forma en que están organizadas, así como se otorga el contacto del administrador web al que podrá realizar consultas al respecto del sistema o ante eventuales inconvenientes.</p>

     <p>No olvide cerrar la sesión antes de abandonar la página.</p>
	 </div>
  </body>
  <footer class="navbar-fixed-bottom">
   <?php include_once("Footer.html") ?>
  </footer>
</html>

<?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }
    ?>
