<?php
      include_once("../conexion.php");
      session_start();
      if(isset($_SESSION['id_tipo_usuario']) && $_SESSION['id_tipo_usuario']==1)
      {
        //Carga Users
          $sql="SELECT id,usuario from personas where id_tipo_usuario=2 order by usuario";
          $result = $con->query($sql); //usamos la conexion para dar un resultado a la variable
          if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
          {
              $comboUsers="";
              while ($row = $result->fetch_array(MYSQLI_ASSOC))
              {
                  $comboUsers .=" <option value='".$row['usuario']."'>".$row['usuario']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
              }
          }
          else
          {
              echo "No hubo resultados";
          }
      $con->close(); //cerramos la conexión
  ?>
<form  action="ModiUser.php" method="POST" name="FormModi">

  <p>Elegir el usuario para modificar: </p>
    <select name="user">
      <?php echo $comboUsers; ?>
    </select>
</br>
<input type="submit" name="ModiUsuario" id="ModiUsuarioBtn" value="Buscar" class="btn btn-info"/>
<br>
</form>

<?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }
    ?>
