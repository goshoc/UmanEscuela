<?php
 include("conexionSQLI.inc");
	//Captura datos desde el Form anterior
	$vUsuario = mysqli_real_escape_string($link,$_POST['USERNAME']); //Escapes special characters
	$vPassword = mysqli_real_escape_string($link,$_POST['PASSWORD']);
	//Arma la instrucción SQL y luego la ejecuta
	$vSql = "SELECT idusuario, accedePanel FROM usuarios WHERE usuario='$vUsuario' and password='$vPassword'";
	$vResultado = mysqli_query($link, $vSql) or die (mysql_error());
	$vDatos = mysqli_fetch_array($vResultado);
	$vCodUsuario = $vDatos['idusuario'];
	if ($vCodUsuario==NULL || $vDatos['accedePanel']==chr(0x0) || $vDatos['accedePanel']=='0'){ header("Location: index.php?errorusuario=si"); } 
	else {
	//como el usuario es correcto, creo una variable de session y lo redirecciono segun el tipo de usuario:
	//si la variable de session existe y tiene los datos de otro usuario, la destruyo!!
	//iniciar la sesión
		session_start();
 		$_SESSION['idUsuario'] = $vCodUsuario;
		header("Location: panel.php"); 
	}		
// Liberar conjunto de resultados
mysqli_free_result($vResultado);
// Cerrar la conexion
mysqli_close($link); 
?>