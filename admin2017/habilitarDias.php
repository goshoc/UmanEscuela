
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

  <!-- PRUEBA-->
  <script type="text/javascript">
    function updateValue(fecha){
      //if (document.getElementById(fecha).checked)
      element = document.getElementById(fecha)
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
  </head>

  <body>
  <?php
  include_once("../conexion.php"); 
session_start();

if($_SESSION['id_tipo_usuario']==1)
  {  
        //CARGAR DIAS DISPONIBLES Y MENUES PARA CADA DIA
        $sql = "SELECT * FROM dia";
        $rec = mysqli_query($con, $sql);
        $diasCompletos = array('fecha','nombre_dia','habilitado');
        $count = 0;
        while ($row =  mysqli_fetch_array($rec))
        {
            $diasCompletos[$count] = array($row['fecha'],$row['nombre_dia'],$row['habilitado']);
            $count++;
        } 
        echo("<form action='actualizarDias.php' method=\"post\">");
        //llenado de tabla. Falta actualizacion de datos
        echo("<table class=\"table table-striped table table-bordered\" name=\""."diasCompletos"."\">");
        echo ("<h2>"."Días"."</h2>");
        echo("<input type='submit' name='update' value='Habilitar' />");
        for($y=0;$y<count($diasCompletos);$y++)
            {
                echo "<tr>";
                echo "<td>";
                if($diasCompletos[$y][2]=="1")
                    { 
                        echo("<label class=\"checkboxDias\"><input id=\"".$diasCompletos[$y][0]."\" type=\"checkbox\" font-size: 200% onChange=\"javascript:updateValue('".$diasCompletos[$y][0]."');\" value=\"0\"checked>"."</label></br>");
          
                    }
                    else
                    {

                        echo("<label class=\"checkboxDias\"><input id=\"".$diasCompletos[$y][0]."\" type=\"checkbox\" font-size: 200% onChange=\"javascript:updateValue('".$diasCompletos[$y][0]."');\"  value=\"0\">"."</label></br>");

                    }
                echo "</td>";
                echo("<td> <p>".$diasCompletos[$y][1]."</p></td>");
                echo("<td> <p>".$diasCompletos[$y][0]."</p></td>");
                echo "</tr>";
            }
        echo " </table>";
        echo("</form>");

  }                      
    
else
   {
      echo("Usted no tiene permiso para entrar a esta área");
    } 
  ?>
  </body>
  </html>