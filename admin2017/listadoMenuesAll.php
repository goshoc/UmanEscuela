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
  	<?php
  		//CARGO LOS PEDIDOS DE LA FECHA PASADA POR POST
	  		$fecha = $_GET['dateSelected'];
        $fechaMax = $_GET['dateMaxSelected'];
        $horaMax = $_GET['timeMaxSelected'];
        $sql = "";
        if(empty($fechaMax) && empty($horaMax))
        {
          $sql = "call getPedidosDia('$fecha')";
        }
        else {
          $fechaHoraMax = $fechaMax." ".$horaMax;
          $sql = "call getPedidosDiaConTope('$fecha','$fechaHoraMax')";
        }
		    $rec = mysqli_query($con, $sql);
		    $pedidos = [];
		    $count = 0;
		    while ($row =  mysqli_fetch_array($rec))
		    {
		        $pedidos[$count] = array($row['fecha'],$row['id_usuario'],$row['id_menu'],$row['usuario'],$row['apellido'],$row['nombre'],$row['descripcion'],$row['comentario'],$row['fecha_ingreso'],$row['curso']);
            $count++;
		    }
   		echo("<table class=\"table table-striped table table-bordered\" name=\"".$fecha."\" id=\"tablaPrincipal\">");
	    echo ("<h2>".$fecha."</h2>");
	    echo "<tr>";
              echo "<th>Curso</th><th>Apellido</th><th>Nombre</th><th>Menú</th><th>Comentario</th><th>Fecha de carga</th>";
	    for($i=0;$i<count($pedidos);$i++)
	    {
	    	echo "<tr>";
              echo "<td>";
              echo "<p>".$pedidos[$i][9]."</p>";
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

      echo "<h2>Cantidades pedidas</h2>";
      for($i=0;$i<100;$i++)
      {
        $cantPedidas[$i][0]= "";
        $cantPedidas[$i][1]="";
      }
      //$cantPedidas = [][];
      foreach($pedidos as $pedido)
      {
        $cantPedidas[$pedido[2]][0]++;
        $cantPedidas[$pedido[2]][1]=$pedido[6];
      }
      foreach ($cantPedidas as $row) {
        if($row[0]!=0)
        {
          echo "<p>$row[1] : $row[0]</p></br>";
        }
     }

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
