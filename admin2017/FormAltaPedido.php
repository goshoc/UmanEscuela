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
            $comboUsers .=" <option value='".$row['id']."'>".$row['usuario']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
        }
    }
    else
    {
        echo "No hubo resultados";
    }
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
$con->close(); //cerramos la conexión
}
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }
?>


<form  action="AltaPedido.php" method="POST" name="FormAlta">
<label>Usuario:</label>
  <select name="usuario">
    <?php echo $comboUsers; ?>
  </select>
</br>
<label>Menú:</label>
  <select name="menu">
    <?php echo $comboMenues; ?>
  </select>
</br>
<label>Fecha: (yyyy-mm-dd)</label>
  <input type="text" name="fecha" id="altaFecha" class="form-control" required>
<label>Comentario:</label>
  <input type="text" name="comentario" id="altaComentario" class="form-control" required><br>
<input type="submit" name="AltaPedido" id="AltaPedidoBtn" value="Registrar" class="btn btn-info"/>
</form>
