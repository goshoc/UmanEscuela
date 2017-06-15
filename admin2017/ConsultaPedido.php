<?php
      include_once("../conexion.php");
      session_start();
      if(isset($_SESSION['id_tipo_usuario']) && $_SESSION['id_tipo_usuario']==1)
      {
  ?>

<html>
	<head>

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
    <script type="text/javascript">
     function updateValue(fecha)
      {
        element = document.getElementById(fecha);

        if (element.checked)
          {
            element.value="1";
          }
        else
          {
            element.value="0";
          }
      }
    </script>
		<title> Listado completo </title>
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

//include('Conectar.php');

$Cant_por_Pag = 20;

//DEBO DEFINIR LA VARIABLE $_GET POR SI NO TIENE VALOR AL PRINCIPIO CON NULL
$pagina = isset ( $_GET['pagina']) ? $_GET['pagina'] : null ;
if (!$pagina) {
$inicio = 0;
$pagina=1;
}
else {
$inicio = ($pagina - 1) * $Cant_por_Pag;

}// total de páginas
$vSql = "SELECT * FROM pedido inner join menu on pedido.id_menu=menu.id_menu where pedido.id_menu!=9999";
$vResultado = mysqli_query($con, $vSql) or die (mysqli_error($con));
$total_registros=$vResultado->num_rows;
$total_paginas = ceil($total_registros/ $Cant_por_Pag);
/* Los SELECT tienen una cláusula llamada LIMIT para indicar los registros a mostrar
LIMIT tiene dos argumentos, el primero es el registro por el que empezar los resultados y el segundo el número de resultados
*/
$vSql = "SELECT * FROM pedido inner join menu on pedido.id_menu=menu.id_menu where pedido.id_menu!=9999 order by fecha,usuario limit $inicio,$Cant_por_Pag ";
$vResultado = mysqli_query($con, $vSql) or die (mysqli_error($con));
?>

<table style= "margin-left: 15px; margin-top: 15px;" class="table-bordered table" border=1>
        <tr class="success">
          <td><b>Lista de Pedidos</b></td>
        </tr>

<?php
if ($row = mysqli_fetch_array($vResultado)){  ?>
    <tr class="success">
    <td>Fecha</td>
    <td>Usuario</td>
    <td>Menú</td>
    <td>Comentario</td>
    </tr>

    <?php
do { ?>

     <tr class="info">
     <td>  <?php echo ($row["fecha"]); ?>   </td>
     <td>  <?php echo ($row["usuario"]); ?>    </td>
     <td>  <?php echo ($row["descripcion"]); ?>  </td>
     <td>  <?php echo ($row["comentario"]); ?>  </td>
     </tr>

   <?php
   ;}
while ($row = mysqli_fetch_array($vResultado)) ;
    ?> </table>

<?php
} else {
echo "¡ No se ha encontrado ningún registro !";
}
?>
<td colspan="1"></td>

<?php
/*
while ($fila = $vResultado->fetch_assoc())
{
?>

  <div class="col-xs-6 col-md-3">

      <?php echo "<a class='thumbnail' href='DetallePelicula.php?personas=" . $fila['IDPelicula'] . "'> <img src='" . $fila['Imagen'] . "' alt='poster pelicula'/></a>"; ?>



</div>

<?php
}*/
// Liberar conjunto de resultados
$vResultado->close();
// Cerrar la conexion
$con->close();
?>


<ul>


<?php
if ($total_paginas > 1){?>      Ir a Página:

<?php
for ($i=1;$i<=$total_paginas;$i++){
  if ($pagina == $i)
//si muestro el índice de la página actual, no coloco enlace
    echo "<strong>". $pagina . "</strong>";// else if ($pagina == $i)  echo  " - "."<a href='ConsultaPedido.php?pagina=" . $i ."'>" . $i . "</a>";
  else if ($total_paginas == $i) echo  " - "."<a href='ConsultaPedido.php?pagina=" . $i ."'>" . $i . "</a>" ;
//si la página no es la actual, coloco el enlace para ir a esa página

    else echo  " - "."<a href='ConsultaPedido.php?pagina=" . $i ."'>" . $i . "</a>". " - " ;}}?>

  </ul>

</body>
</html>

<?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }
    ?>
