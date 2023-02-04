<?php 
include '../data/data.php';
    $pdo = Database::conectar();
    
    $sql2 = 'SELECT  `vehiculoplaca` FROM `tbvehiculo`';
    $combobit2 ="";
    foreach ($pdo->query($sql2) as $row) {
        $combobit2 .=" <option value='".$row['vehiculoplaca']."'>".$row['vehiculoplaca']."</option>"; 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<script src="js/jquery.min.js"></script>
</head>
<style type="text/css">
       
       input{
        width: 120px;
       }
       table {
  width: 30%;
  height: 100px;
}


     </style>
<body>
	<div class="container">
		<div class="row">
			<h3>Ruta</h3>
		</div>
		<div class="row">
			<p>
				<a href="../index.php" class="btn btn-success">Menú</a>
			</p>
		
				<form method="POST" name="rutaform" id="rutaform" action="../business/rutaaction.php">
				<table class="display" id="dynamic_field">
					<tr>	
						<td>Codigo Ruta<input required name="codigo" type="text" maxlength="10" placeholder="Codigo de la ruta" value="<?php echo !empty($codigo)?$codigo:'';?>">
						</td>
						<td>Lugar Salida<input maxlength="30"required name="salida" type="text" placeholder="Lugar de salida" value="<?php echo !empty($salida)?$salida:'';?>">
						</td>
						<td>Lugar Destino<input maxlength="30" required name="destino" type="text"  placeholder="Lugar destino" value="<?php echo !empty($destino)?$destino:'';?>">
						</td>
						<td>Tarifa minima<input min="1" max="9999999" id="tarifaMi" required name="tarifaMi" type="number"  placeholder="Tarifa minima" value="<?php echo !empty($tarifaMi)?$tarifaMi:'';?>">
						</td>
						<td>Tarifa maxima<input id="tarifaMa" min="1" max="9999999" required name="tarifaMa" type="number"  placeholder="Tarifa maxima" value="<?php echo !empty($tarifaMa)?$tarifaMa:'';?>">
						</td>
						<td>Tiempo promedio<input name="tiempoPromedio" type="time"  placeholder="Tiempo promedio" value="<?php echo !empty($tiempoPromedio)?$tiempoPromedio:'';?>">
						</td>
						<td>
						<td><input type="submit" value="Insertar" name="insertar" id="insertar"/> </td>
						</table>
					</tr>
				</form>
				<div class="row">
                <table class="table table-striped table-bordered" >
				
				<thead>
					<tr>
						<th>Codigo Ruta</th>
						<th>Lugar Salida</th>
						<th>Lugar Destino</th>
						<th>Tarifa minima</th>
						<th>Tarifa maxima</th>
						<th>Tiempo promedio</th>
						<th>Acción</th>
					</tr>
				</thead>
				<tbody>
					<?php
					//include '../data/data.php';
					//$pdo = Database::conectar();
					$sql = 'SELECT * FROM tbruta';
					foreach ($pdo->query($sql) as $row) {
						echo '<form method="post" enctype="multipart/form-data" action="../business/rutaaction.php">';
						echo '<input type="hidden" name="id" value="' . $row['rutaid'] . '">';
						echo '<tr>';
						echo '<td><input type="text" name="codigo" id="codigo" value="'. $row['rutacodigo'] . '"/></td>';
						echo '<td><input type="text" name="salida" id="salida" value="'. $row['rutalugarsalida'] . '"/></td>';
						echo '<td><input type="text" name="destino" id="destino" value="'. $row['rutalugardestino'] .  '"/></td>';
						echo '<td><input type="number" name="tarifaMi" id="tarifaMi" value="'. $row['rutatarifaminima'] .  '"/></td>';
						echo '<td><input type="number" name="tarifaMa" id="tarifaMa" value="'. $row['rutatarifamaxima'] .  '"/></td>';
						echo '<td><input type="time" name="tiempoPromedio" id="tiempoPromedio" value="'. $row['rutatiempopromedio'] .  '"/></td>';

						echo '<td>';
						echo '<a class="btn" href="verruta.php?id='.$row['rutaid'].'">Ver</a>';
						echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
						echo '<td><a class="btn btn-danger" href="eliminarruta.php?id='.$row['rutaid'].'">Eliminar</a></td>';
						
						echo '</td>';
						echo '</tr>';
						echo '</form>';
					}
					Database::desconectar();
					?>
				</tbody>
				</table>
        		</div>
		</div>
	</div> <!-- /container -->


	<script type="text/javascript">
		

		$("#tarifaMi").change(function(){
     if(parseInt(this.value) > 9999999){
        
        this.value = '';
     } 
});
		$("#tarifaMa").change(function(){
     if(parseInt(this.value) > 9999999){
        
        this.value = '';
     } 
});
	</script>
</body>
</html>