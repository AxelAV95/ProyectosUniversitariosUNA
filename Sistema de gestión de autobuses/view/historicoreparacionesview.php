<?php 

		  include '../data/data.php';
		  include '../data/mantenimientodata.php';
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>Historico reparaciones</title>
	<script src="js/jquery.min.js"></script>   
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">

</head>
<body>
	<h1>
		Historial de reparaciones
	</h1>

	<a href="mantenimientocrud.php" class="btn btn-success">Volver</a>
	<div class="row" style="margin-top: 60px;">

                <table id="table_id" class="table table-striped table-bordered"  >
                  <thead >
                    <tr >
                      <th align="left">ID</th>
                      <th align="left">Mecánico</th>
                      <th align="left">Bus</th>
                      <th align="left">Periodo de reparación</th>
                      
                    </tr>
                  </thead>






                  <tbody>
                  <?php

                  $md = new MantenimientoData();
                   $pdo = Database::conectar();
                   $sql = 'SELECT * FROM tbreparacionhistorico';
                   foreach ($pdo->query($sql) as $row) {
                   

                          echo '<tr>';
                            echo '<td>'.$row['reparacionhistoricoid'].'</td>';
                            echo $md -> getInfoEmpleado($pdo,$row['reparacionhistoricoempleadoid']);
                            //echo '<td>'.$row['reparacionhistoricoempleadoid'].'</td>';

                             echo $md -> getInfoVehiculo($pdo,$row['reparacionhistoricobusid']);
                            
                            echo '<td>'.$row['reparacionhistoricofecha'].'</td>';
                            
                            echo '</tr>';

                   }	
                   Database::desconectar();
                  ?>
                  </tbody>

            </table>
        </div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
	
	var esp = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ ",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sSearch":         "Buscar:",
    "sInfoPostFix":    "",
    
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
        $(document).ready(function() {
    $('#table_id').dataTable(
        {
        "language": esp
    });

} );
</script>
</body>
</html>