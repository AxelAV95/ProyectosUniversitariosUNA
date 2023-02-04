<?php

$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'bdbuses';

$db = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);


$sql= "SELECT * FROM tbvehiculo WHERE vehiculoestado = 'Disponible'";

$result = mysqli_query($db,$sql);

$data = array();
echo '<option value="0">Seleccionar</option>';

while( $row = mysqli_fetch_array($result) ){
    echo '<option value="'.$row['vehiculoplaca'].'">'.$row['vehiculoplaca'].'</option>';
   
}

?>