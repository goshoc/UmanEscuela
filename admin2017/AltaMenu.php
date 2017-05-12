<?php  
      include_once("../conexion.php"); 
      session_start();
      if($_SESSION['id_tipo_usuario']==1)
      {  
  ?>
<html>
<head>
<title>Alta menú</title>
</head>
<body>
<?php 
 //Captura datos desde el Form anterior

$vDescripcion = $_POST['Descripcion'];

//Arma la instrucción SQL y luego la ejecuta
//Si hay que validar si algo existe o no, va aca.

/*$vSql = "SELECT Count(usuario) FROM usuarios WHERE usuario='$vUsuario'";
$vResultado = mysql_query($vSql, $link) or die (mysql_error());;
$vCantUsuarios = mysql_result($vResultado, 0);

if ($vCantUsuarios != 0){
       echo ("El Usuario ya Existe<br>");
       echo ("<A href='MenuABM.htm'>VOLVER AL  ABM</A>");
}
else {*/
echo("INSERT INTO `menu`(`descripcion`) VALUES (\"".$vDescripcion."\")");
$vSql = "INSERT INTO `menu`(`descripcion`) VALUES (\"".$vDescripcion."\")";
       mysqli_query($con, $vSql) or die (mysql_error());
       echo("El menu se agrego correctamente.<br>");
       echo ("<a href='index.php'>VOLVER AL MENU</a>");
 // Liberar conjunto de resultados
 // mysql_free_result($vResultado);

/*} */

// Cerrar la conexion
mysqli_close($con); 
?>
</body>
</html> 

<?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }  
    ?>

