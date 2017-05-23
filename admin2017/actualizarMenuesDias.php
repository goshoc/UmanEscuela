<?php
  include_once("../conexion.php"); 
session_start();

if($_SESSION['id_tipo_usuario']==1)
	{ 
		$numero = count($_GET);
			$tags = array_keys($_GET);// obtiene los nombres de las variables
			$valores = array_values($_GET);// obtiene los valores de las varibles	
			$tagsFec = array();
			$tagsMen = array();

			//dividr el tags en 2 valores fecha y menu
				for($i=0;$i<$numero;$i++)
				{	//2017-04-048  fecha:2017-04-04 id_menu:8
					$tagsFec[$i] = substr($tags[$i], 0, 10);
					$tagsMen[$i] = substr($tags[$i], 10);		
				};
			//BORRO TODOS LOS MENUES CARGADOS PARA LAS FECHAS PASADAS COMO PARAM.
				for($i=0;$i<count($tagsFec);$i++)
				{
					$sql="DELETE FROM `dia-menu` WHERE fecha='$tagsFec[$i]'";
					mysqli_query($con, $sql) or die (mysql_error());
				}

			
			for($i=0;$i<$numero;$i++)
			{
				//echo("INSERT INTO `dia-menu`(`fecha`, `id_menu`) VALUES ('$tagsFec[$i]',$tagsMen[$i]) </br>");
				$sql="INSERT INTO `dia-menu`(`fecha`, `id_menu`) VALUES ('$tagsFec[$i]',$tagsMen[$i])";
				mysqli_query($con, $sql) or die (mysql_error());	
			}
			echo("Se actualizaron los menues sin problema.");
			echo("<p><a href=\"index.php\">Volver al men&uacute;</a></p>");
			mysqli_close($con);
	}

?>