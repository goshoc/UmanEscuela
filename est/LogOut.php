<?php
session_start(); 

$_SESSION = array(); 

session_destroy(); 
echo "Ha salido del sistema.";
header('Location: ../index.html');
?>

