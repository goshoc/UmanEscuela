<?php
      include_once("../conexion.php");
      session_start();
      if($_SESSION['id_tipo_usuario']==1)
      {
        //Carga Users
          $sql="SELECT id,usuario from personas where id_tipo_usuario=2 order by usuario";
          $result = $con->query($sql); //usamos la conexion para dar un resultado a la variable
          if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
          {
              $comboUsers="";
              while ($row = $result->fetch_array(MYSQLI_ASSOC))
              {
                  $comboUsers .=" <option value='".$row['id']."'>".$row['usuario']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
              }
          }
          else
          {
              echo "No hubo resultados";
          }
      $con->close(); //cerramos la conexión
  ?>
	 <div class="container" id="central">
	 <form action="../admin2017/listadoMenuesAll.php">
     <h2>Listar pedidos de todos los usuarios</h2>
	 <p>Elegir fecha para generar listado: </p>
	 <p>yyyy-mm-dd</p>
	 <input type="text" name="dateSelected"><br>
   <p>Elegir la fecha hasta la que se quiere listar los pedidos</p>
   <p>yyyy-mm-dd</p>
   <input type="text" name="dateMaxSelected" value="2017-12-31"><br>
   <p>Elegir la hora hasta la que se quiere listar los pedidos</p>
   <p>hh:mm:ss</p>
   <input type="text" name="timeMaxSelected" value="23:59:59"><br>
	 <input type="submit" id="btnSubmit" value="Submit">
  </form>

  <form action="../admin2017/listadoMenuesUser.php">
  <h2>Listar todos los pedidos de un usuario</h2>
  <p>Elegir el usuario para generar listado: </p>
    <select name="userId">
      <?php echo $comboUsers; ?>
    </select>
  <input type="submit" id="btnSubmit" value="Submit">
 </form>
	 </div>

<?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }
    ?>
