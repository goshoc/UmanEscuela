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
            <ul class="nav navbar-nav">
              <li class="active" id="navHome"><a href="#">Home</a></li>
              <li id="navHabDia"><a href="#">Habilitar días</a></li>
              <li id="navHabMenu"><a href="#">Habilitar menues</a></li>
              <li id="navABMDias"><a href="#">ABM días</a></li>
              <li id="navABMMenu"><a href="#">ABM menues</a></li>
              <li id="navABMUser"><a href="#">ABM usuarios</a></li>
              <li id="navListMenu"><a href="#">Listado de menues</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li id="navLogOut"><a href="LogOut.php">Log out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
  	<div class="container">
      <div class="central">
  	<?php
  		//CARGO LOS PEDIDOS DEL USER PASADO POR GET
	  		$userId = $_GET['userId'];
        $sql = "call getPedidosConUser('$userId')";
		    $rec = mysqli_query($con, $sql);
		    $pedidos = [];
		    $count = 0;
		    while ($row =  mysqli_fetch_array($rec))
		    {
		        $pedidos[$count] = array($row['fecha'],$row['id_usuario'],$row['id_menu'],$row['usuario'],$row['apellido'],$row['nombre'],$row['descripcion'],$row['comentario'],$row['fecha_ingreso']);
            $count++;
		    }
   		echo("<table class=\"table table-striped table table-bordered\" name=\"".$userId."\" id=\"tablaPrincipal\">");
	    echo ("<h2>".$pedidos[0][3]."</h2>");
	    echo "<tr>";
              echo "<th>Fecha</th><th>Apellido</th><th>Nombre</th><th>Menú</th><th>Comentario</th><th>fecha de carga</th>";
	    for($i=0;$i<count($pedidos);$i++)
	    {
	    	echo "<tr>";
              echo "<td>";
              echo "<p>".$pedidos[$i][0]."</p>";
      echo "</td>";
              echo "<td>";
              echo "<p>".$pedidos[$i][4]."</p>";
			echo "</td>";
			echo "<td>";
              echo "<p>".$pedidos[$i][5]."</p>";
			echo "</td>";
			echo "<td>";
              echo "<p>".$pedidos[$i][6]."</p>";
			echo "</td>";
			echo "<td>";
              echo "<p>".$pedidos[$i][7]."</p>";
			echo "</td>";
			echo "<td>";
              echo "<p>".$pedidos[$i][8]."</p>";
			echo "</td>";
              echo "</tr>";
	    }
	    echo "</table>";

  ?>
</div>
	</div>
  	</body>
  </html>
  <?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }
    ?>
