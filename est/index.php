
<html lang="en">
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

  </head>
  <body> 
  <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Uman Menú</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	
	<div class="container">
	
 <?php  
include_once("../conexion.php"); 
session_start();

if($_SESSION['id_tipo_usuario']==2)
{ 
  //CARGAR DIAS DISPONIBLES Y MENUES PARA CADA DIA
  $sql = "SELECT * FROM dia WHERE habilitado=1";
  $rec = mysqli_query($con, $sql);
  $diasHabilitados = array('fecha','nombre_dia');
  $count = 0;
  while ($row =  mysqli_fetch_array($rec))
  {
    $diasHabilitados[$count] = array($row['fecha'],$row['nombre_dia']);
    $count++;
  } 

echo("<h1>Entraste al menu del alumno: ". $_SESSION['nombre']. "</h1>");
 
 /* Inicio De Tablas*/
 echo("<form action=\"../est/enviar_datos.php\">");
  for ($i=0; $i < count($diasHabilitados); $i++) { 
     echo("<table class=\"table table-striped table table-bordered\" name=\"".$diasHabilitados[$i][0]."\">");
  echo ("<h2>".$diasHabilitados[$i][1]." ".$diasHabilitados[$i][0]."</h2>");
  echo "<tr>";
  echo "<td>";

//busco menues para el dia $i
 $sql= "
SELECT * FROM `menu` join `dia-menu` on menu.id_menu=`dia-menu`.`id_menu`
WHERE `dia-menu`.`fecha`='".$diasHabilitados[$i][0]."'";
$rec = mysqli_query($con, $sql);
$menues = array('id_menu','descripcion');
  $count = 0;
  while ($row =  mysqli_fetch_array($rec))
  {
    $menues[$count] = array($row['id_menu'],$row['descripcion']);
    $count++;   
  }
//fin busca menues [$i]
//REVISAR SI SE ACOMODA BIEN EL TD Y TR O HAY QUE INCLUIRLO EN EL FOR, PARA QUE SE HAGA STRIPED TABLE
    for($y=0;$y<count($menues);$y++)
      {
        echo ("<input type="."radio"." name=".$diasHabilitados[$i][0]." value=\"".$menues[$y][0]."\"/> ".$menues[$y][1]."</br>");  
      }
      echo "<input type="."radio"." name=".$diasHabilitados[$i][0]." value=\""."9999"."\"/> "."Nada"."</br>";
   echo "<p>Comentarios</p>";
   echo "<input type="."text"." name="."comentario".$diasHabilitados[$i][0]." value=\"\" /> </br>";
   
   echo "</td>";
   echo "</tr>";
  echo " </table>";
/* Fin de tablas */

}
//echo("<input type=\"button\" name=\"enviar\" title=\"enviar\" value=\"Enviar\">");
echo("<input type=\"submit\"  value=\"Enviar\"/>");
  }
      else{
        echo("Usted no tiene permiso para entrar a esta área");
      }  
?>
	</div>
  </body>
</html>
