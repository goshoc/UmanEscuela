
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

<script type="text/javascript">
  $(document).ready(function()
      {
        $('#BtnAltaUser').click(function()
        {
        $.ajax({
        type: "POST",
        url: "FormAltaUser.html",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });
         $('#BtnModiUser').click(function()
        {
        $.ajax({
        type: "POST",
        url: "FormModiUser.php",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });
          $('#BtnBajaUser').click(function()
        {
        $.ajax({
        type: "POST",
        url: "FormDeleteUser.html",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });
        $('#BtnListUser').click(function()
        {
        $.ajax({
        type: "POST",
        url: "ConsultaUser.php",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });
        $('#BtnPassEmail').click(function()
        {
        $.ajax({
        type: "POST",
        url: "FormEnvioPassEmail.php",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });


        $('#BtnAltaPedido').click(function()
        {
        $.ajax({
        type: "POST",
        url: "FormAltaPedido.php",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });
         $('#BtnModiPedido').click(function()
        {
        $.ajax({
        type: "POST",
        url: "FormModiPedido.php",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });
          $('#BtnBajaPedido').click(function()
        {
        $.ajax({
        type: "POST",
        url: "FormBajaPedido.php",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });

        $('#BtnListPedido').click(function()
        {
        $.ajax({
        type: "POST",
        url: "ConsultaPedido.php",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });

        $('#BtnAltaMenu').click(function()
        {
        $.ajax({        
        type: "POST",
        url: "FormAltaMenu.html",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });
         $('#BtnModiMenu').click(function()
        {
        $.ajax({        
        type: "POST",
        url: "FormModiMenu.html",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });
          $('#BtnBajaMenu').click(function()
        {
        $.ajax({        
        type: "POST",
        url: "FormBajaMenu.html",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });

        $('#BtnListMenu').click(function()
        {
        $.ajax({        
        type: "POST",
        url: "ConsultaMenu.php",
        success: function(a) {
                $('#central').html(a); 
                  }
          });
        });

      });
</script>

</head>

  <footer class="navbar-fixed-bottom">
   <?php include_once("Footer.html") ?>
  </footer>



<div class="container">


<p><a href="index.php">HOME</a></p>

<p><a href="#">HABILITAR DÍAS</a></p>

<p><a href="#">HABILITAR MENÚS</a></p>

<p><a href="#">ABMC PEDIDOS</a></p>
  <li id="BtnAltaPedido"><a href="#">Alta</a></li>
  <li id="BtnModiPedido"><a href="#">Modificación</a></li>
  <li id="BtnBajaPedido"><a href="#">Baja</a></li>
  <li id="BtnListPedido"><a href="#">Listado Completo</a></li><br>

<p><a href="#">ABMC MENÚS</a></p>
  <li id="BtnAltaMenu"><a href="#">Alta</a></li>
  <li id="BtnModiMenu"><a href="#">Modificación</a></li>
  <li id="BtnBajaMenu"><a href="#">Baja</a></li>
  <li id="BtnListMenu"><a href="#">Listado Completo</a></li><br>

<p><a id="navABMUser" href="#">ABMC USUARIOS</a></p>
  <li id="BtnAltaUser"><a href="#">Alta</a></li>
  <li id="BtnModiUser"><a href="#">Modificación</a></li>
  <li id="BtnBajaUser"><a href="#">Baja</a></li>
  <li id="BtnListUser"><a href="#">Listado Completo</a></li>
  <li id="BtnPassEmail"><a href="#">Enviar contraseña por email</a></li><br>

<p><a href="#">LISTADO DE PEDIDOS</a></p>

<p><a href="#">CERRAR SESIÓN</a></p><br>

</div>
</html>
<?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }
    ?>