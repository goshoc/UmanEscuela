<?php
session_start();
include_once "../conexion.php";
if($_SESSION['id_tipo_usuario']==2)
{ 
	$numero = count($_GET);
	$tags = array_keys($_GET);// obtiene los nombres de las varibles
	$valores = array_values($_GET);// obtiene los valores de las varibles	
	// crea las variables y les asigna el valor
	for($i=0;$i<$numero;$i++)
	{
	$$tags[$i]=$valores[$i];
	}
			for($i=0;$i<$numero;$i=$i+2)
			{
				$sql= ("INSERT INTO `pedido`	(`fecha`, `id_usuario`, `id_menu`, `comentario`) VALUES (\"".$tags[$i]."\",\"".$_SESSION['id']."\",".$valores[$i].",\"".$valores[$i+1]."\"); ");

				$result = $con->query($sql);
				if ( false===$result )
				{
					 	echo("</br></br>");
 	 					printf("error: %s\n", mysqli_error($con));
 	 					echo("</br></br>");	 					
				}
				else 
				{
  					echo ("Registrado el menú del día: ".$tags[$i].".</br>" );
  				}
			}	
}
else 
{
	echo"Usted no tiene permiso para entrar a esta área";	
}
?>