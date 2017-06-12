<?php
      include_once("../conexion.php");
      session_start();
      if($_SESSION['id_tipo_usuario']==1)
      {
  ?>
<html>
<head>
<title>Envio contraseña del usuario</title>
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

$vUserID = $_POST['id'];
$vSqlverif = "SELECT * FROM personas WHERE id='$vUserID'";
$vResultado = mysqli_query($con, $vSqlverif) or die (mysql_error($con));
while ($row = $vResultado->fetch_array(MYSQLI_ASSOC))
{
  $Email =$row['email'];
  $vUser = $row['usuario'];
  $vPassword = $row['password'];
}
$vEmail = filter_var($Email, FILTER_SANITIZE_EMAIL);

$Title = "UMAN";
$EmailBody = "Acaba de pedir la contraseña.\n Usuario:'".$vUser."'\nContraseña: '".$vPassword."' ";
//Arma la instrucción SQL y luego la ejecuta
//Si hay que validar si algo existe o no, va aca.

if (filter_var($vEmail, FILTER_VALIDATE_EMAIL) === false){
       echo ("'".$vEmail."' no es un email válido.<br>");
       echo ("<A href='index.php'>Volver a Uman Menu</A>");
}
else {

       $bool = mail('$vEmail','$Title','$EmailBody');
      if($bool){ echo "Mensaje enviado";}  else{echo "Mensaje no enviado";}
       echo ("<a href='index.php'>VOLVER AL MENU</a>");

       }
 // Liberar conjunto de resultados
 // mysql_free_result($vResultado);

/*} */

// Cerrar la conexion
mysqli_close($con);
?>
</div>
</body>
</html>

<?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }
    ?>
