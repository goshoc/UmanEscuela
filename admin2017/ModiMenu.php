<?php  
      include_once("../conexion.php"); 
      session_start();
      if(isset($_SESSION['id_tipo_usuario']) && $_SESSION['id_tipo_usuario']==1)
      {  
  ?>
<html>
<head>
<title>Modificación Menu</title>
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

$id_menu = $_POST['id_menu'];


$vSqlverif = "SELECT * FROM menu WHERE id_menu ='$id_menu' ";
$vResultado = mysqli_query($con, $vSqlverif) or die (mysqli_error($con));
$vCantMenus = $vResultado->num_rows;

  if ($vCantMenus != 0){

       $fila = $vResultado->fetch_array(MYSQLI_ASSOC);

       ?>
<h2>Descripción del Menú</h2>

<form method="POST"  action="ModiMenuNewData.php" id="modificarMenuForm">
<input type="hidden" name="id_menu"  id ="modificarMenu" class="form-control" value="<?php echo($fila['id_menu']); ?>" required>
<label>Descripción:</label>
<input type="text" name="descripcion" id="modificarNombre" class="form-control" value="<?php echo($fila['descripcion']); ?>" required>
<br>
<input type="submit" name="ModificarMenu" id="modificarMenuBtn" value="Actualizar" class="btn btn-info"/>
</form>

<?php


       // echo ("<A href='index.php'>Volver a Uman Menu</A>");
  }
  else { 
    echo("No se encontró el mení especificado"); }



// Liberar conjunto de resultados
$vResultado->free();
// Cerrar la conexion
$con->close();
?>
</body>
</html> 

<?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }  
    ?>

