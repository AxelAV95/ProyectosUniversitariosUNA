<?php
// Carga la configuración 


// Conexión con los datos del 'config.ini' 
$conexion= mysqli_connect('localhost','root','','dbsaf2'); 

// Si la conexión falla, aparece el error 
if($conexion === false) { 
 //echo 'Ha habido un error <br>'.mysqli_connect_error(); 
} else {
 //echo 'Conectado a la base de datos';
}
?>