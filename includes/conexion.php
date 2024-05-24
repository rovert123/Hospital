<?php

$host="localhost";
$user="root";
$pw="";
$db="hospital";

/* Prueba de conexión a la base de datos MySQL*/
$link = mysqli_connect($host, $user, $pw, $db);
 
// Se verifica la conexión, si no se puede realizar se indica el error
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
