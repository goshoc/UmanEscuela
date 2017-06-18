  <?php
      include_once("../conexion.php");
      session_start();
      if(isset($_SESSION['id_tipo_usuario']) && $_SESSION['id_tipo_usuario']==1)
      {
        //Carga Users
          $sql="SELECT id,usuario,email from personas where id_tipo_usuario=2 and (email not like \"\") order by usuario";
          $result = $con->query($sql); //usamos la conexion para dar un resultado a la variable
          if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
          {
              $comboUsers="";
              while ($row = $result->fetch_array(MYSQLI_ASSOC))
              {
                  $comboUsers .=" <option value='".$row['id']."'>".$row['usuario']."</option>";
              }
          }
          else
          {
              echo "No hubo resultados";
          }
      $con->close(); //cerramos la conexión
  ?>

<h3 style="text-align:center">Enviar constraseña de usuario por email</h3><br>

<form  action="EnviarPassEmail.php" method="POST" name="FormEnvio">

  <p>Elegir el usuario para enviarle la contraseña al mail guardado: </p>
    <select name="user">
      <?php echo $comboUsers; ?>
    </select>
</br>
<input type="submit" name="EnvioEmail" id="BtnEnvioEmail" value="Buscar" class="btn btn-info"/>
<br>
</form>

<?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }
    ?>
