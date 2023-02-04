<?php 

  include '../data/data.php';
  include '../business/businessmedicion.php';

?>
<?php

  
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "dbsaf2");
$columns = array('medicionclientemedidorid', 'Enero','Febrero','Marzo','Abril','Mayo','Junio', 'Julio', 'Agosto','Septiembre', 'Octubre', 'Noviembre', 'Diciembre','AnioActual', 'Eliminar');

$query = "SELECT * FROM tbmediciongeneral  ";
$query2 = "SELECT * FROM tbcliente";
if(isset($_POST["search"]["value"]))
{
 $query .= ' WHERE medicionclientemedidorid LIKE "%'.$_POST["search"]["value"].'%"  OR `AnioActual` LIKE "%'.$_POST["search"]["value"].'%" ';
}


/*if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}*/
/*else
{
 $query .= 'ORDER BY id DESC ';
}*/

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();
  $bussMed = new BusinessMedicion();
                   $pdo = Database::conectar();
                    $pdo -> exec("set names utf8");

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<td contenteditable class="update" data-id="'.$row["medicionid"].'" data-column="ID">' . $row["medicionid"] . '</td>';
 $sub_array[] = $bussMed-> getinfoCliente($pdo,$row['medicionclientemedidorid']);
 $sub_array[] = '<div  class="update" data-id="'.$row["medicionclientemedidorid"].'" data-column="Medidor">' . $row["medicionclientemedidorid"] . '</div>';
 $sub_array[] = '<td><div contenteditable class="update" data-id="'.$row["medicionid"].'" data-column="Enero">' . $row["Enero"] . '</div></td>';
 $sub_array[] = '<td><div contenteditable class="update" data-id="'.$row["medicionid"].'" data-column="Febrero">' . $row["Febrero"] . '</div></td>';
 $sub_array[] = '<td><div contenteditable class="update" data-id="'.$row["medicionid"].'" data-column="Marzo">' . $row["Marzo"] . '</div></td>';
 $sub_array[] = '<td><div contenteditable class="update" data-id="'.$row["medicionid"].'" data-column="Abril">' . $row["Abril"] . '</div></td>';
 $sub_array[] = '<td><div contenteditable class="update" data-id="'.$row["medicionid"].'" data-column="Mayo">' . $row["Mayo"] . '</div></td>';
 $sub_array[] = '<td><div contenteditable class="update" data-id="'.$row["medicionid"].'" data-column="Junio">' . $row["Junio"] . '</div></td>';
 $sub_array[] = '<td><div contenteditable class="update" data-id="'.$row["medicionid"].'" data-column="Julio">' . $row["Julio"] . '</div></td>';
 $sub_array[] = '<td><div contenteditable class="update" data-id="'.$row["medicionid"].'" data-column="Agosto">' . $row["Agosto"] . '</div></td>';
 $sub_array[] = '<td><div contenteditable class="update" data-id="'.$row["medicionid"].'" data-column="Septiembre">' . $row["Septiembre"] . '</div></td>';
 $sub_array[] = '<td><div contenteditable class="update" data-id="'.$row["medicionid"].'" data-column="Octubre">' . $row["Octubre"] . '</div></td>';
 $sub_array[] = '<td><div contenteditable class="update" data-id="'.$row["medicionid"].'" data-column="Noviembre">' . $row["Noviembre"] . '</div></td>';
 $sub_array[] = '<td><div contenteditable class="update" data-id="'.$row["medicionid"].'" data-column="Diciembre">' . $row["Diciembre"] . '</div></td>';
 $sub_array[] = '<td><div  class="update" data-id="'.$row["medicionid"].'" data-column="AnioActual">' . $row["AnioActual"] . '</div></td>';
 
$sub_array[] = '<td><div type="button" name="delete" class="bEliminar delete" id="'.$row["medicionid"].'"></button></td>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM tbmediciongeneral";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);


function getInfoCliente($id) {
	$pdo = Database::conectar();
        $sql = 'SELECT * FROM `tbcliente` WHERE clientemedidor = '.$id.'';
        $result = "";
        foreach ($conn->query($sql) as $row) {
            $result.= '<td>' .$row['clientenombre']." ". $row['clienteapellido1']." ".$row['clienteapellido2'].'</td>';
    }

    return $result;
    
    }


echo json_encode($output);

?>