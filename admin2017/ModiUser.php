<?php  
      include_once("../conexion.php"); 
      session_start();
      if($_SESSION['id_tipo_usuario']==1)
      {  
  ?>
<html>
<head>
<title>Alta Usuario</title>
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
    </nav> 

<div class="container"> 

<?php 
 //Captura datos desde el Form anterior

$vUser = $_POST['user'];
// $vPassword = (string) rand(11111111,999999999);//"asdfgghj";
// $vNombre = $_POST['nombre'];
// $vApellido = $_POST['apellido'];
// $vEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
// $vEmail = filter_var('$vMail', FILTER_SANITIZE_EMAIL);
// $Title = "UMAN";
// $EmailBody = "Acaba de ser registrado como usuario. Usuario:'".$vUser."'\nPassword: '".$vPassword."' ";
//Arma la instrucción SQL y luego la ejecuta
//Si hay que validar si algo existe o no, va aca.

$vSqlverif = "SELECT * FROM personas WHERE usuario='$vUser' ";
$vResultado = mysqli_query($con, $vSqlverif) or die (mysqli_error($con));
$vCantUsers = $vResultado->num_rows;
//$vCantUsuarios = mysql_result($vResultado, 0);

/* if (filter_var($vEmail, FILTER_VALIDATE_EMAIL) === false){
       echo ("'".$vEmail."' is not a valid email address<br>");
       echo ("<A href='index.php'>Volver a Uman Menu</A>");
}
else {
*/
  if ($vCantUsers != 0){

       $fila = $vResultado->fetch_array(MYSQLI_ASSOC);

       ?>
<h2>Datos Personales del usuario <?php echo($fila['usuario']); ?> </h2>

<form method="POST"  action="ModiUserNewData.php" id="modificarUsuarioForm">
<input type="hidden" name="user"  id ="modificarUsuario" class="form-control" value="<?php echo($fila['usuario']); ?>" required>
<label>Nombre:</label>
<input type="text" name="nombre" id="modificarNombre" class="form-control" value="<?php echo($fila['nombre']); ?>" required>
<label>Apellido:</label>
<input type="text" name="apellido" id="modificarApellido" class="form-control" value="<?php echo($fila['apellido']); ?>" required>
<label>Password:</label>
<input type="text" name="password" id="modificarPassword" class="form-control" value="<?php echo($fila['password']); ?>" required>
<label>Email:</label>
<input type="email" name="email" id="modificarEmail" class="form-control" value="<?php echo($fila['email']); ?>" required>
<br>
<input type="submit" name="ModificarUsuario" id="modificarUsuarioBtn" value="Actualuzar" class="btn btn-info"/>
</form>

<?php


       // echo ("<A href='index.php'>Volver a Uman Menu</A>");
  }
  else { 
    echo("No se encontró el usuario especificado"); }



// Liberar conjunto de resultados
$vResultado->free();
// Cerrar la conexion
$con->close();

//echo("INSERT INTO `personas`(`descripcion`) VALUES (\"".$vDescripcion."\")");
 //WHERE `usuario` = '" . $usuario . "' and `password` = '" . $password . "'";
//echo("INSERT INTO `personas`(`usuario`,`password`,`id_tipo_usuario`,`nombre`,`apellido`,`email`) 
//         values (\"".$vUser."\", \"".$vPassword."\", 2, \"".$vNombre."\", \"".$vApellido."\", \"".$vEmail."\")");

/* $vSql = "INSERT INTO `personas`(`usuario`,`password`,`id_tipo_usuario`,`nombre`,`apellido`,`email`) 
          values (\"".$vUser."\", \"".$vPassword."\", 2, \"".$vNombre."\", \"".$vApellido."\", \"".$vEmail."\")";
       mysqli_query($con, $vSql) or die (mysql_error());
       echo("El usuario se agrego correctamente.<br>");

       $bool = mail('$vEmail','$Title','$EmailBody');
      if($bool){ echo "Mensaje enviado";}  else{echo "Mensaje no enviado";}
       echo ("<a href='index.php'>VOLVER AL MENU</a>");
       }
 // Liberar conjunto de resultados
 // mysql_free_result($vResultado);

 */

// Cerrar la conexion
//mysqli_close($con); 
?>
</body>
</html> 

<?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }  
    ?>

