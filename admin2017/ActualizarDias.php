<?php

  include_once("../conexion.php"); 
session_start();

echo("Hola");



if(isset($_POST['update'])) {
	echo($_POST['2017-04-19']);
    $stmt = $con->prepare("UPDATE dia SET habilitado= ? WHERE fecha= ?");
    //foreach ($_POST['fecha'] as $row => $value){  
        //$stmt->bind_param('di', $_POST['habilitado'][$row], $value); 
        //$stmt->execute(); 
    //}
    $stmt->close();
}
?>