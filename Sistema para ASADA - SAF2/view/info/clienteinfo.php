<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
   /* border: 1px solid black;*/
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','dbsaf2');
mysqli_set_charset($con,"utf8");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"dbsaf2");
$sql="SELECT * FROM tbcliente WHERE clientemedidor = '".$q."'";
$result = mysqli_query($con,$sql);


$clienteID = "";
while($row = mysqli_fetch_array($result)) {
    
        $clienteID = $row['clienteid'] ;

         echo "<table>
            <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Primer apellido</th>
            <th>Segundo apellido</th>
            <th>Cédula</th>
            <th>Correo</th>
            </tr>";
                echo "<tr>";

                echo "<td>" . $row['clienteid'] . "</td>";
                echo "<td>" . $row['clientenombre'] . "</td>";
                echo "<td>" . $row['clienteapellido1'] . "</td>";
                echo "<td>" . $row['clienteapellido2'] . "</td>";
                echo "<td>" . $row['clientecedula'] . "</td>";
                echo "<td>" . $row['clientecorreo'] . "</td>";
                
                echo "</tr>";
                
               
}

echo "</table>";

if(empty($clienteID )){
    echo '<center><h2 style="padding-top: 40px; padding-bottom: 40px;">Cliente no encontrado.</h2><center>';
}else{
    $year = date("Y");
    echo "<br><br>";
    echo "<strong><label >Año actual: </label></strong><br>";
    echo "<input readonly id=anio name=anio value='".$year."'>";
    echo "<br><br>";
    /*echo "<label class=control-label>Año</label> <br>";
                     echo "<select name=anio>";
                        
                            foreach(range(1990, (int)date("Y")) as $year) {
                            echo "\t<option value='".$year."'>".$year."</option>\n\r";
                            }

                    echo "<br>";
                   echo "</select>";
                   echo "<br>";
                    echo "<br>";*/
                   //  echo "<button id =insertar type=submit name = insertar class=btn btn-success>Agregar</button><br><br>";

}

echo "<input type=hidden id=clienteid name=clienteid value='$clienteID''>";
mysqli_close($con);


?>




</body>
</html>