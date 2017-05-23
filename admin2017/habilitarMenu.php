<?php
  include_once("../conexion.php"); 
session_start();

if($_SESSION['id_tipo_usuario']==1)
  {  
  		//CARGA DIAS HABILITADOS
			$sql = "SELECT * FROM dia WHERE habilitado='1'";
		    $rec = mysqli_query($con, $sql);
		    $diasHabilitados = array('fecha','nombre_dia','habilitado');
		    $count = 0;
		    while ($row =  mysqli_fetch_array($rec))
		    {
		        $diasHabilitados[$count] = array($row['fecha'],$row['nombre_dia'],$row['habilitado']);
		        $count++;
		    }
		    /*	
		    for($y=0;$y<count($diasHabilitados);$y++)
		    {
		    	echo($diasHabilitados[$y][0]." ".$diasHabilitados[$y][1]." ".$diasHabilitados[$y][2]."</br>");
		    }
		    */
		//CARGA MENUES DISPONIBLES
		    $sql = "SELECT * FROM menu";
		    $rec = mysqli_query($con, $sql);
		    $menuDisponibles = array('id_menu','descripcion');
		    $count = 0;
		    while ($row =  mysqli_fetch_array($rec))
		    {
		        $menuDisponibles[$count] = array($row['id_menu'],$row['descripcion']);
		        $count++;
		    }
		    /* 
		    for($y=0;$y<count($menuDisponibles);$y++)
		    {
		    	echo($menuDisponibles[$y][0]." ".$menuDisponibles[$y][1]."</br>");
		    }
		    */
		//CARGO MENUES Y DIAS YA ASOCIADOS
		    $sql = "SELECT * FROM `dia-menu`";
		    $rec = mysqli_query($con, $sql);
		    $menuDiaDisp = array('fecha','id_menu');
		    $count = 0;
		    while ($row =  mysqli_fetch_array($rec))
		    {
		        $menuDiaDisp[$count] = array($row['fecha'],$row['id_menu']);
		        $count++;
		    }
		    /*
		    for($y=0;$y<count($menuDiaDisp);$y++)
		    {
		    	echo($menuDiaDisp[$y][0]." ".$menuDiaDisp[$y][1]."</br>");
		    }
		    */
        echo("<form action='actualizarMenuesDias.php'>");
        echo("<input type='submit' value='Actualizar' />");
        echo"<div class='row'>";     
        for($y=0;$y<count($diasHabilitados);$y++)
        {   
        	echo("<table class=\"table table-striped table table-bordered\" name=\"".$diasHabilitados[$y][0]."\">");
  			echo ("<h2>".$diasHabilitados[$y][1]." ".$diasHabilitados[$y][0]."</h2>");
  			for($x=0;$x<count($menuDisponibles);$x++)
  			{
  				echo "<tr>";
                echo "<td>";

                //VER SI EL MENU ESTA DISPONIBLE O NO
                	$estaDisp=0;               	
                	for($j=0;$j<count($menuDiaDisp);$j++)
                	{
                		if($menuDiaDisp[$j][0]==$diasHabilitados[$y][0])
                		{
                			if($menuDiaDisp[$j][1]==$menuDisponibles[$x][0])
                			{
                				$estaDisp=1;
                			}
                		}
                	}
                	
                if($estaDisp=="1")
                    { 
                      echo("<label class=\"checkboxDias\"><input name=\"".$diasHabilitados[$y][0].$menuDisponibles[$x][0]."\" id=\"".$diasHabilitados[$y][0].$menuDisponibles[$x][0]."\" type=\"checkbox\" font-size: 200% onChange=\"javascript:updateValue('".$diasHabilitados[$y][0].$menuDisponibles[$x][0]."');\" value=\"1\"checked>"."</label></br>");
          
                    }
                    else
                    {
                        echo("<label class=\"checkboxDias\"><input name=\"".$diasHabilitados[$y][0].$menuDisponibles[$x][0]."\" id=\"".$diasHabilitados[$y][0].$menuDisponibles[$x][0]."\" type=\"checkbox\" font-size: 200% onChange=\"javascript:updateValue('".$diasHabilitados[$y][0].$menuDisponibles[$x][0]."');\"  value=\"0\">"."</label></br>");

                    }
                echo "</td>";
                echo("<td> <p>".$menuDisponibles[$x][1]."</p></td>");
                echo "</tr>";
  			}
  			echo " </table>";
        }
        echo("</form>");
        echo"</div>";

  }                      
    
else
   {
      echo("Usted no tiene permiso para entrar a esta área");
    } 
  ?>
