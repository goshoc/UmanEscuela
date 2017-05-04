
<?php
session_start();
include_once "conexion.php";

	$usuario = $_POST["txtUsuario"];
	$password = $_POST["txtPassword"];

	$sql = "SELECT * FROM `personas` WHERE `usuario` = '" . $usuario . "' and `password` = '" . $password . "'";	
	$sqlResultado = mysqli_query($con, $sql);
	if ($fila = mysqli_fetch_array($sqlResultado))
	{		
		$_SESSION['usuario'] = $fila['usuario'];
		$_SESSION['nombre'] = $fila['nombre'];
		$_SESSION['id_tipo_usuario'] = $fila['id_tipo_usuario'];
		$_SESSION['apellido'] = $fila['apellido'];
		$_SESSION['id'] = $fila['id'];
	
		if($fila['id_tipo_usuario'] == 1)
		{
			//1 es administrador
			//mysql_free_result($sqlResultado);
			header('Location: admin2017/index.php');
			//header('Location: reservamenu.php');
		}
		if($fila['id_tipo_usuario'] == 2)
		{
			//0 es estudiante
			//mysql_free_result($sqlResultado);
			header('Location: est/index.php');			
		}
	}
	else{
		header('Location: index.html?errorLogin');
	}
?> 