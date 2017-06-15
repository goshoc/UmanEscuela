
<?php
      include_once("../conexion.php");
      session_start();
      if(isset($_SESSION['id_tipo_usuario']) && $_SESSION['id_tipo_usuario']==1)
      {
  ?>
<html>
<head>

<title>Mapa del sitio</title>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
   <!--
    Cuando este lista, cambiar favicon y descomentarlo
   <link rel="icon" href="../../favicon.ico"> -->
    <title>Mapa del sitio</title>
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

    <script type="text/javascript" src="recargaPantalla.js"></script>
</head>

  <footer class="navbar-fixed-bottom">
   <?php include_once("Footer.html") ?>
  </footer>



<div class="container">
  
<p><a href="#">Menú</a></p>
    
  
  <li id="BtnAltaUser"><a href="#">Alta</a></li>
  <li id="BtnModiUser"><a href="#">Modificación</a></li>
  <li id="BtnBajaUser"><a href="#">Baja</a></li>
  <li id="BtnListUser"><a href="#">Listado Completo</a></li>
  <li id="BtnPassEmail"><a href="#">Enviar contraseña por email</a></li>
  
</div>
</html>
<?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }
    ?>