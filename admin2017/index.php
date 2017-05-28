<?php  
      include_once("../conexion.php"); 
      session_start();
      if($_SESSION['id_tipo_usuario']==1)
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
  <body> 
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
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
            <li class="active" id="navHome"><a href="#">Home</a></li>
            <li href="#" id="navHabDia"><a href="#">Habilitar días</a></li>
            <li id="navHabMenu"><a href="#">Habilitar menues</a></li>
            <li id="navABMDias"><a href="#">ABM días</a></li>
            <li id="navABMMenu"><a href="#">ABM menues</a></li>
            <li id="navABMUser"><a href="#">ABM usuarios</a></li>
            <li id="navListMenu"><a href="listadoMenues.php">Listado de menues</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">    
          <li id="navLogOut"><a href="#">Log out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	
	 <div class="container" id="central">  
	 </div>
  </body>
</html>

<?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }  
    ?>