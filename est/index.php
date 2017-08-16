<?php
include_once("../conexion.php");
session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- El Meta Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- El CSS de Material Design con un color establecido , yo usaré el color Rosado Índigo -->
    <link rel="stylesheet" href="../css/materiald/styles.css" />
    <link rel="stylesheet" href="../css/materiald/material.min.css">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.brown-pink.min.css" />
    <link rel="stylesheet" href="../css/materiald/estilo.css" />
    <!-- El archivo JS de Material Design -->
    <script src="../css/materiald/material.min.js"></script>
    <!-- Un tipo de Fuente desde Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
   <!--Cuando este lista, cambiar favicon y descomentarlo
   <link rel="icon" href="../../favicon.ico"> -->
    <title>Uman</title>
    <link href="../css/indexEst.css" rel="stylesheet">
  </head>
  

  <body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
          <h3>Bienvenido
            <?php echo($_SESSION['nombre']) ?>
          </h3>
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
          <p>En el caso de marcar un menú un día que no querías, tenes que marcar ese día la opción que dice "NADA".</p>
        </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark mdl-shadow--8dp">
          <a href="LogOut.php" class="mdl-layout__tab">Cerrar sesión</a>
        </div>
      </header>


	 <main class="mdl-layout__content">
      <div class="mdl-layout__tab-panel is-active">
        <div class="mdl-grid">
          <div class="mdl-cell mdl-cell--12-col ">


<?php
//  if($_SESSION['id_tipo_usuario']==2)
if($_SESSION['id_tipo_usuario']==2)
{
  //CARGAR DIAS DISPONIBLES Y MENUES PARA CADA DIA
    $sql = "SELECT * from dia where habilitado='1' and fecha not in(select fecha from pedido where id_usuario=".$_SESSION['id'].")";
    $rec = mysqli_query($con, $sql) or die(mysqli_error($con));
    $diasHabilitados = []; //Esto carga el primer elemento como fecha y como nombre_dia, puede ser?
    $count = 0;
    while ($row =  mysqli_fetch_array($rec))
    {
      $diasHabilitados[$count] = array($row['fecha'],$row['nombre_dia']);
      $count++;
    }
 /* Inicio De Tablas*/
   echo("<form action=\"../est/enviar_datos.php\" method=\"POST\">");
    for ($i=0; $i < count($diasHabilitados); $i++) {
      echo("<section class=\"section--center  mdl-shadow--4dp\">");
       echo("<table class=\"mdl-data-table mdl-js-data-table\" style=\"width:100%\" name=".$diasHabilitados[$i][0].">");
        echo (" <thead>
                <tr>
                  <th class=\"titulo\" >".$diasHabilitados[$i][1]." ".$diasHabilitados[$i][0]."
                  </th>
                </tr>
              </thead>");


    //busco menues para el dia $i
       $sql= "
      SELECT * FROM `menu` join `dia-menu` on menu.id_menu=`dia-menu`.`id_menu`
      WHERE `dia-menu`.`fecha`='".$diasHabilitados[$i][0]."'";
      $rec = mysqli_query($con, $sql);
      //$menues = array('id_menu','descripcion');
      $menues =[];
      $count = 0;
        while ($row =  mysqli_fetch_array($rec))
        {
          $menues[$count] = array($row['id_menu'],$row['descripcion']);
          $count++;
        }
    //fin busca menues [$i]
    //Inicio  cuerpo tabla
      if(!empty($menues))
      {
        echo "<tbody>";
          for($y=0;$y<count($menues);$y++)
            {
              echo "<tr>";
                echo "<td class=\"fila_menu\">";
                  echo("<label class=\"mdl-radio mdl-js-radio mdl-js-ripple-effect\" for=".$diasHabilitados[$i][0].$menues[$y][0].">");
                    echo ("<input type=\"radio\" id=".$diasHabilitados[$i][0].$menues[$y][0]." class=\"mdl-radio__button\" name=".$diasHabilitados[$i][0]." value=\"".$menues[$y][0]."\">");
              //echo ("<input type="."radio"." name=".$diasHabilitados[$i][0]." value=\"".$menues[$y][0]."\"/> ".$menues[$y][1]."</br>");
                    echo("<span class=\"mdl-radio__label\">".$menues[$y][1]."</span>");
                    echo("    </label>
                        </td>
                      </tr>");
            }
              echo "<tr>";
                echo "<td class=\"fila_menu\">";
                  echo("<label class=\"mdl-radio mdl-js-radio mdl-js-ripple-effect\" for=".$diasHabilitados[$i][0]."nada".">");
                    echo ("<input type=\"radio\" id=".$diasHabilitados[$i][0]."nada"." class=\"mdl-radio__button\" name=".$diasHabilitados[$i][0]." value=\"9999\">");
                    echo("<span class=\"mdl-radio__label\">Nada</span>");
                    echo("    </label>
                        </td>
                      </tr>");
              echo "<tr>";
                echo "<td class=\"fila_menu\">";
                  echo(" <div class=\"comentario mdl-textfield mdl-js-textfield\">
                      <input type=\"text\" name=\"comentario".$diasHabilitados[$i][0]."\" class=\"mdl-textfield__input\"  id=\"comentario".$diasHabilitados[$i][0]."\" value=\"\">
                      <label class=\"mdl-textfield__label\" for=\"comentario".$diasHabilitados[$i][0]."\">Comentario...</label>
                      </div>
                      ");
                    echo("</td>
                      </tr>");
                     }
        //ESTO ULTIMO NO MODIFIQUE
         echo "<input type=\"hidden\" name=\"fechaTabla".$i."\"  id =\"modificarUsuario\" class=\"form-control\" value=\"".$diasHabilitados[$i][0]."\">";
         echo "</tbody>";
        echo " </table>";


  echo"</section>";
/* Fin de tablas */

}
echo "<input type=\"hidden\" name=\"cantTablas\"  id =\"modificarUsuario\" class=\"form-control\" value=\"".count($diasHabilitados)."\">";
?>
<section class="section--center mdl-shadow--2dp">
<div style="width:100%">
<button type="submit" class="btn-confirmar mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" style="width:100%">
  Confirmar
</button>
</div>
</section>

<?php
  }
      else{
        echo("Usted no tiene permiso para entrar a esta área");
      }
?>
	</div>
</div>
</div>

  </main>
  </div>
  </body>
  <footer class="navbar-fixed-bottom">
   <?php include_once("Footer.html") ?>
  </footer>

</html>
