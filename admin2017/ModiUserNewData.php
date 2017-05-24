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
$vPassword = $_POST['password']; //(string) rand(11111111,999999999);//"asdfgghj";
$vNombre = $_POST['nombre'];
$vApellido = $_POST['apellido'];
$vEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
//$vEmail = filter_var('$vMail', FILTER_SANITIZE_EMAIL);
//$Title = "UMAN";
//$EmailBody = "Acaba de ser registrado como usuario. Usuario:'".$vUser."'\nPassword: '".$vPassword."' ";

$vSqlverif = "SELECT * FROM personas WHERE usuario!='$vUser' and email='$vEmail' ";
$vResultado = mysqli_query($con, $vSqlverif) or die (mysql_error($con));
$vCantUsers = $vResultado->num_rows;

if (filter_var($vEmail, FILTER_VALIDATE_EMAIL) === false){
       echo ("'".$vEmail."' is not a valid email address<br>");
       //echo ("<A href='index.php'>Volver a Uman Menu</A>");
}
else {

if ($vCantUsers == 0){
$vSql = "UPDATE personas set password='$vPassword', nombre='$vNombre', apellido='$vApellido', email='$vEmail' where usuario='$vUser'";
$vResultado = mysqli_query($con, $vSql) or die (mysqli_error($con));

// Cerrar la conexion
$con->close();


echo("Se han actualizado los datos con exito");

}
else { echo("Ya existe otro usuario con el mail ingresado");

}}

?>

</body>
</html> 

<?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }  
    ?>

