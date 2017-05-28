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
   
  </head>
  	<body>
  	<div class="container">
  	<?php

  		//CARGO LOS PEDIDOS DE LA FECHA PASADA POR POST
	  		$fecha = $_GET['dateSelected'];
	  		$sql = "call getPedidosDia('$fecha')";
		    $rec = mysqli_query($con, $sql);
		    $pedidos = array('fecha','id_usuario','id_menu','usuario','apellido','nombre','descripcion','comentario','fecha_ingreso');
		    $count = 0;
		    while ($row =  mysqli_fetch_array($rec))
		    {
		        $pedidos[$count] = array($row['fecha'],$row['id_usuario'],$row['id_menu'],$row['usuario'],$row['apellido'],$row['nombre'],$row['descripcion'],$row['comentario'],$row['fecha_ingreso']);	

		        $count++;
		    }
		    echo (count($pedidos));	   
     		echo("<table class=\"table table-striped table table-bordered\" name=\"".$fecha."\">");
		    echo ("<h2>".$fecha."</h2>");
		    echo "<tr>";
                echo "<th>apellido</th><th>Nombre</th><th>Menú</th><th>Comentario</th><th>fecha de carga</th>";               
				echo "<td>";
		    for($i=0;$i<count($pedidos);$i++)
		    {
		    	echo "<tr>";
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
  	</body>
  </html>
  <?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }  
    ?>