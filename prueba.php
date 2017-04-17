<?php
include("conexion.php");


echo("entró");
if (!$con) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
else
{

  $sql = "SELECT * FROM dia WHERE habilitado=1";
  $rec = mysqli_query($con, $sql);
  $diasHabilitados = array('fecha','nombre_dia');
  $count = 0;
  while ($row =  mysqli_fetch_array($rec))
  {
    $diasHabilitados[$count] = array($row['fecha'],$row['nombre_dia']);
    $count++;
    echo("<p>".$diasHabilitados[$count-1][0].",".$diasHabilitados[$count-1][1]."</p>");
  }
  

}
?>