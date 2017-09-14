<?php
include_once("../conexion.php");
session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- El Meta Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- El CSS de Material Design con un color establecido , yo usaré el color Rosado Índigo -->
    <link rel="stylesheet" href="../css/materiald/styles.css" />
    <link rel="stylesheet" href="../css/materiald/material.min.css">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.brown-pink.min.css" />
    <link rel="stylesheet" href="../css/materiald/estilo.css" />
    <!-- El archivo JS de Material Design -->
    <script src="../css/materiald/material.min.js"></script>
    <!-- Un tipo de Fuente desde Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
   <!--Cuando este lista, cambiar favicon y descomentarlo
   <link rel="icon" href="../../favicon.ico"> -->
    <title>Uman</title>
    <link href="../css/indexEst.css" rel="stylesheet">
  </head>

 <body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
          <h3>Listo, 
            <?php echo($_SESSION['nombre']) ?>
          </h3>
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
          <p>Ya tomamos tu pedido.</p>
        </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark mdl-shadow--8dp">
          <a href="LogOut.php" class="mdl-layout__tab">Cerrar sesión</a>
        </div>
      </header>


	 <main class="mdl-layout__content">
      <div class="mdl-layout__tab-panel is-active">
        <div class="mdl-grid">
          <div class="mdl-cell mdl-cell--12-col ">

			<section class="section--center  mdl-shadow--4dp">
			<div class="mdl-card__supporting-text">
		<?php
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
						if($valores[$k]==9999)
						{
							
						}
						else
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

    
								echo ("Registrado el menú para el día: ".$fechaTabla[$l].".</br>" );
							}
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
		</section>
		</div>
		</div>
		</div>
	  </main>
	  </div>
 </body>

  <footer class="navbar-fixed-bottom">
   <?php include_once("Footer.html") ?>
  </footer>

</html>
