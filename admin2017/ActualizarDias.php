<?php

  include_once("../conexion.php"); 
session_start();



$numero = count($_GET);
echo("Conto: ". $numero."<br>");
	$tags = array_keys($_GET);// obtiene los nombres de las varibles
	$valores = array_values($_GET);// obtiene los valores de las varibles	
	

	//MODIFICA BIEN EN LA BD, EL PROBLEMA ES QUE RECIBEN MAS LOS DATOS, REVISAR ESO
	$sql="UPDATE dia set habilitado='0'";
	mysqli_query($con, $sql) or die (mysql_error());

	for($i=0;$i<$numero;$i++)
	{
	//echo("UPDATE dia set  habilitado='$valores[$i]' where fecha='$tags[$i]';<br>");
	$sql="UPDATE dia set  habilitado='$valores[$i]' where fecha='$tags[$i]';";
	mysqli_query($con, $sql) or die (mysql_error());
		
	}
	mysqli_close($con);


?>