<?php 
include '../data/data.php';
    $pdo = Database::conectar();
    
    $sql2 = 'SELECT  `empleadoid` FROM `tbempleado` WHERE `empleadotipo`= 1 ';
    $combobit ="";
    foreach ($pdo->query($sql2) as $row) {
        $combobit .=" <option value='".$row['empleadoid']."'>".$row['empleadoid']."</option>"; 
    }


    if(isset($_GET['mensaje'])){
      $mensaje = $_GET['mensaje'];
   
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

</head>

<body>
	<div class="container">
		<div class="row">
			<h3>Vehiculos</h3>
		</div>
		<div class="row">
			<p>
				<a href="../index.php" class="btn btn-success">Menú</a>
			</p>
			<table class="display">
				<thead>
					<tr>
						<th>Placa</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Tipo</th>
						<th>Capacidad</th>
						<th>Estado</th>
						<th>Empleado</th>
						<th>Acción</th>
					</tr>
				</thead>

				<form method="POST" name="vehiculoform" id="vehiculoform" action="../business/vehiculoaction.php">
					<tr>	
						<td><input required name="placa" type="text"  placeholder="Placa del vehiculo" value="<?php echo !empty($placa)?$placa:'';?>">
						</td>
						<td><input required name="marca" type="text"  placeholder="Marca" value="<?php echo !empty($marca)?$marca:'';?>">
						</td>
						<td><input required name="modelo" type="text"  placeholder="Modelo" value="<?php echo !empty($modelo)?$modelo:'';?>">
						</td>
						<td>
							<select required name="tipo">
          						<option>Bus</option>
          						<option>Buseta</option>
        					</select>
						</td>
						<td><input required name="capacidad" type="number"  placeholder="Capacidad" value="<?php echo !empty($capacidad)?$capacidad:'';?>">
						</td>

						<td>
							<select required name="estado">
								<option>Disponible</option>
								<option>Ocupado</option>
								<option>En revision</option>
							</select>
							<td><select style="width: 120px;" name="empleadoid">
										<?php echo $combobit; ?>
							</select></td>
						</td>

						<td><input type="submit" value="Insertar" name="insertar" id="insertar"/> </td>
						
					</tr>
				</form>
				<tbody>
					<?php
					$pdo = Database::conectar();
					$sql = 'SELECT * FROM tbvehiculo';
					foreach ($pdo->query($sql) as $row) {
						echo '<form method="post" enctype="multipart/form-data" action="../business/vehiculoaction.php">';
						echo '<input type="hidden" name="id" value="' . $row['vehiculoid'] . '">';
						echo '<tr>';
						echo '<td><input type="text" name="placa" id="placa" value="'. $row['vehiculoplaca'] . '"/></td>';
						echo '<td><input type="text" name="marca" id="marca" value="'. $row['vehiculomarca'] . '"/></td>';
						echo '<td><input type="text" name="modelo" id="modelo" value="'. $row['vehiculomodelo'] .  '"/></td>';
						echo '<td><input type="text" name="tipo" id="tipo" value="'. $row['vehiculotipo'] .  '"/></td>';
						echo '<td><input type="number" name="capacidad" id="capacidad" value="'. $row['vehiculocapacidad'] . '"/></td>';
						echo '<td><input type="text" name="estado" id="estado" value="'. $row['vehiculoestado'] . '"/></td>';
						echo '<td><input type="text" name="empleadoid" id="empleadoid" value="'. $row['vehiculoempleadoid'] . '"/></td>';

						echo '<td>';
						echo '<a class="btn" href="vervehiculo.php?id='.$row['vehiculoid'].'">Ver</a>';
						echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
						echo '<td><a class="btn btn-danger" href="eliminarvehiculo.php?id='.$row['vehiculoid'].'">Eliminar</a></td>';
						
						echo '</td>';
						echo '</tr>';
						echo '</form>';
						echo '<td><a href="rtvview.php?id='.$row['vehiculoid'].'"><input  type="submit" value="RTV" name="licencia" id="licencia"/></a></td>';
					
					}
					Database::desconectar();
					?>
				</tbody>
			</table>
		</div>
	</div> <!-- /container -->
</body>
</html>