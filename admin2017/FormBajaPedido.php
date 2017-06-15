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
}
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }
?>

<form  action="DeletePedido.php" method="POST" name="FormDelete">
<h2>Seleccione pedido a eliminar:</h2>
<label>Usuario:</label>
  <select name="user">
    <?php echo $comboUsers; ?>
  </select>
</br>
<label>Fecha: (yyyy-mm-dd)</label>
  <input type="text" name="fecha" id="DeleteFecha" class="form-control" required>
<br>
<input type="submit" name="DeletePedido" id="DeletePedidoBtn" value="Eliminar" class="btn btn-info"/>
<br>
</form>
