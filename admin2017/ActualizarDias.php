<?php
  include_once("../conexion.php");
session_start();

$numero = count($_GET);
	$tags = array_keys($_GET);// obtiene los nombres de las varibles
	$valores = array_values($_GET);// obtiene los valores de las varibles
	$sql="UPDATE dia set habilitado='0'";
	mysqli_query($con, $sql) or die (mysql_error());

	for($i=0;$i<$numero;$i++)
	{
	$sql="UPDATE dia set habilitado='$valores[$i]' where fecha='$tags[$i]';";
	mysqli_query($con, $sql) or die (mysql_error());
	}
	mysqli_close($con);
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
          <a class="navbar-brand" href="index.php">Uman Menú</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <li id="navLogOut"><a href="LogOut.php">Cerrar sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  <div class="container">
    <div class="central">
<p>Se habilitaron los días correctamente.</p>
</div>
</div>
  </body>
</html>
