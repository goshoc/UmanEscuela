<html lang="en">
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
	            <li class="active"><a href="index.php">Home</a></li>
	          </ul>
	          <ul class="nav navbar-nav navbar-right">
	          <li><a href="LogOut.php">Log out</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>
			<div class='container'>
		<?php
		session_start();
		include_once "../conexion.php";
		if(isset($_SESSION['id_tipo_usuario']) && $_SESSION['id_tipo_usuario']==2)
		{
			$numero = count($_POST);
			$tags = array_keys($_POST);// obtiene los nombres de las varibles
			$valores = array_values($_POST);// obtiene los valores de las varibles

			for($j=0;$j<$_POST["cantTablas"];$j++)
			{
				$fechaTabla[$j] = $_POST["fechaTabla".$j];
			}
			for($l=0;$l<count($fechaTabla);$l++)
			{
				for($k=0;$k<count($tags);$k++)
				{
					if($tags[$k]==$fechaTabla[$l])
					{
						//echo"(\"INSERT INTO `pedido`	(`fecha`, `id_usuario`, `id_menu`, `comentario`) VALUES (\"".$fechaTabla[$l]."\",\"".$_SESSION['id']."\",".$valores[$k].",\"".$valores[$k+1]."\"); \");";
						$sql= ("INSERT INTO `pedido`	(`fecha`, `id_usuario`, `id_menu`, `comentario`) VALUES (\"".$fechaTabla[$l]."\",\"".$_SESSION['id']."\",".$valores[$k].",\"".$valores[$k+1]."\"); ");

						$result = $con->query($sql);
						if ( false===$result )
						{
								echo("</br></br>");
								printf("error: %s\n", mysqli_error($con));
								echo("</br></br>");
						}
						else
						{
								echo ("Registrado el menú del día: ".$fechaTabla[$l].".</br>" );
							}
					}
				}
			}
		}
		else
		{
			echo"Usted no tiene permiso para entrar a esta área";

		}
		?>
		</div>
	</body>
  <footer class="navbar-fixed-bottom">
   <?php include_once("Footer.html") ?>
  </footer>

</html>
