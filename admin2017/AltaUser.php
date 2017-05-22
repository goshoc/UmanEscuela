<?php  
      include_once("../conexion.php"); 
      session_start();
      if($_SESSION['id_tipo_usuario']==1)
      {  
  ?>
<html>
<head>
<title>Alta Usuario</title>
</head>
<body>
<?php 
 //Captura datos desde el Form anterior

$vUser = $_POST['user'];
$vPassword = (string) rand(11111111,999999999);//"asdfgghj";
$vNombre = $_POST['nombre'];
$vApellido = $_POST['apellido'];
$vEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
//$vEmail = filter_var('$vMail', FILTER_SANITIZE_EMAIL);
$Title = "UMAN";
$EmailBody = "Acaba de ser registrado como usuario. Usuario:'".$vUser."'\nPassword: '".$vPassword."' ";
//Arma la instrucción SQL y luego la ejecuta
//Si hay que validar si algo existe o no, va aca.

$vSqlverif = "SELECT * FROM personas WHERE usuario='$vUser' or email='$vEmail' ";
$vResultado = mysqli_query($con, $vSqlverif) or die (mysql_error($con));
$vCantUsers = $vResultado->num_rows;
//$vCantUsuarios = mysql_result($vResultado, 0);

if (filter_var($vEmail, FILTER_VALIDATE_EMAIL) === false){
       echo ("'".$vEmail."' is not a valid email address<br>");
       echo ("<A href='index.php'>Volver a Uman Menu</A>");
}
else {

  if ($vCantUsers != 0){
       echo ("El Usuario ya existe<br>");
       echo ("<A href='index.php'>Volver a Uman Menu</A>");
  }
  else {

//echo("INSERT INTO `personas`(`descripcion`) VALUES (\"".$vDescripcion."\")");
 //WHERE `usuario` = '" . $usuario . "' and `password` = '" . $password . "'";
//echo("INSERT INTO `personas`(`usuario`,`password`,`id_tipo_usuario`,`nombre`,`apellido`,`email`) 
//         values (\"".$vUser."\", \"".$vPassword."\", 2, \"".$vNombre."\", \"".$vApellido."\", \"".$vEmail."\")");

$vSql = "INSERT INTO `personas`(`usuario`,`password`,`id_tipo_usuario`,`nombre`,`apellido`,`email`) 
          values (\"".$vUser."\", \"".$vPassword."\", 2, \"".$vNombre."\", \"".$vApellido."\", \"".$vEmail."\")";
       mysqli_query($con, $vSql) or die (mysql_error());
       echo("El usuario se agrego correctamente.<br>");

       $bool = mail('$vEmail','$Title','$EmailBody');
      if($bool){ echo "Mensaje enviado";}  else{echo "Mensaje no enviado";}
       echo ("<a href='index.php'>VOLVER AL MENU</a>");
       }}
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

