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
        echo("<form action='actualizarDias.php'>");
        //llenado de tabla. Falta actualizacion de datos
        echo("<table class=\"table table-striped table table-bordered\" name=\""."diasCompletos"."\">");
        echo ("<h2>"."Días"."</h2>");
        echo("<input type='submit' value='Habilitar' />");
        for($y=0;$y<count($diasCompletos);$y++)
            {
                echo "<tr>";
                echo "<td>";
                if($diasCompletos[$y][2]=="1")
                    { 
                      echo("<label class=\"checkboxDias\"><input name=\"".$diasCompletos[$y][0]."\" id=\"".$diasCompletos[$y][0]."\" type=\"checkbox\" font-size: 200% onChange=\"javascript:updateValue('".$diasCompletos[$y][0]."');\" value=\"1\"checked>"."</label></br>");
                      //  echo("<input name=\"".$diasCompletos[$y][0]."\" type=\"checkbox\" font-size: 200% onChange=\"javascript:updateValue('".$diasCompletos[$y][0]."');\" value=\"1\"checked>"."</br>");
          
                    }
                    else
                    {
                        echo("<label class=\"checkboxDias\"><input name=\"".$diasCompletos[$y][0]."\" id=\"".$diasCompletos[$y][0]."\" type=\"checkbox\" font-size: 200% onChange=\"javascript:updateValue('".$diasCompletos[$y][0]."');\"  value=\"0\">"."</label></br>");
                        //echo("<input name=\"".$diasCompletos[$y][0]."\" type=\"checkbox\" font-size: 200% onChange=\"javascript:updateValue('".$diasCompletos[$y][0]."');\"  value=\"0\">"."</br>");

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
