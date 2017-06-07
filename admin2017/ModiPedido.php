<?php
      include_once("../conexion.php");
      session_start();
      if($_SESSION['id_tipo_usuario']==1)
      {
      //Carga Menues
        $sql="SELECT id_menu,descripcion from menu";
        $result = $con->query($sql); //usamos la conexion para dar un resultado a la variable
        if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
        {
            $comboMenues="";
            while ($row = $result->fetch_array(MYSQLI_ASSOC))
            {
                $comboMenues .=" <option value='".$row['id_menu']."'>".$row['descripcion']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
            }
        }
        else
        {
            echo "No hubo resultados";
        }
  ?>
<html>
<head>
<title>Modificar pedido</title>
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
$usuario = $_POST['usuario'];
$fecha = $_POST['fecha'];
//Arma la instrucción SQL y luego la ejecuta
//Si hay que validar si algo existe o no, va aca.

$vSqlverif = "SELECT * FROM pedido WHERE id_usuario='$usuario' and fecha='$fecha' ";
$vResultado = mysqli_query($con, $vSqlverif) or die (mysqli_error($con));
$vCantPedidos = $vResultado->num_rows;
//$vCantUsuarios = mysql_result($vResultado, 0);

  if ($vCantPedidos != 0){

       $fila = $vResultado->fetch_array(MYSQLI_ASSOC);

       ?>
<h2>Datos del pedido</h2>
<form method="POST"  action="ModiPedidoNewData.php" id="modificarPedidoForm">
  <input type="hidden" name="usario"  id ="modificarUsuario" class="form-control" value="<?php echo $usuario ?>" required>
  <input type="hidden" name="fecha"  id ="modificarFecha" class="form-control" value="<?php echo $fecha ?>" required>
</br>
<label>Menú:</label>
  <select name="menu">
    <?php echo $comboMenues; ?>
  </select>
</br>
<label>Comentario:</label>
  <input type="text" name="comentario" id="altaComentario" class="form-control" required><br>
<input type="submit" name="AltaPedido" id="AltaPedidoBtn" value="Modificar" class="btn btn-info"/>
</form>
<?php
       // echo ("<A href='index.php'>Volver a Uman Menu</A>");
  }
  else {
    echo("No se encontró el pedido especificado"); }

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
