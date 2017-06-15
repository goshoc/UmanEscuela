<?php
      include_once("../conexion.php");
      session_start();
      if(isset($_SESSION['id_tipo_usuario']) && $_SESSION['id_tipo_usuario']==1)
      {
  ?>
<html>
<head>
<title>Alta Pedido</title>
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
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
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
$usuario = $_POST['usuario'];
$menu = $_POST['menu'];
$fecha = $_POST['fecha'];
$comentario = $_POST['comentario'];

$vSqlverif = "SELECT * FROM pedido WHERE id_usuario='$usuario' and fecha='$fecha' ";
$vResultado = mysqli_query($con, $vSqlverif) or die (mysql_error($con));
$vCantPedidos = $vResultado->num_rows;

  if ($vCantPedidos != 0){
       echo ("El pedido ya existe<br>");
  }
  else {
$vSql = "INSERT INTO `pedido`(`fecha`, `id_usuario`, `id_menu`, `comentario`) VALUES ('$fecha','$usuario','$menu','$comentario')";
       mysqli_query($con, $vSql) or die (mysql_error());
       echo("El pedido se agrego correctamente.<br>");
// Cerrar la conexion
mysqli_close($con);
}
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
