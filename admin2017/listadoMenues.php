<?php  
      include_once("../conexion.php"); 
      session_start();
      if($_SESSION['id_tipo_usuario']==1)
      {  
  ?>
	 <div class="container" id="central">  
	 <form action="../admin2017/listadoMenues2.php">
	 <p>Elegir fecha para generar listado: </p>
	 <p>yyyy-mm-dd</p>
	 <input type="text" name="dateSelected"><br>
	 <input type="submit" id="btnSubmit" value="Submit">
  </form>
	 </div>

<?php }
     else
      {
         echo("Usted no tiene permiso para entrar a esta área");
      }  
    ?>