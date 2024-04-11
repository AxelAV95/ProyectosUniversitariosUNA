<?php 
	
	
	$datos = ControladorTexto::obtenerTextos();

 ?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>	Tarea - Cursos sistemas operativos</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>

	<center><h2>Neo4j CRUD</h2></center>

	<center>

		<div style="width: 80%;">
			<input type="text" name="texto" class="texto" style="margin-right: 5px;"><button onclick="insertarTexto();" type="button" class="btn btn-primary">Insertar</button>
			<table id="tablaTarea" class="display">
			    <thead>
			        <tr>
			            <th>ID</th>
			            <th>Texto</th>
			            <th>Acción</th>
			        </tr>
			    </thead>
			    <tbody>

			    	<?php 
			    		foreach ($datos as $key => $value) {
						   
						 	

						 	echo '<tr>';
						 	echo '<td>'.intval($value['id']+1).'</td>';
						 	echo '<td id="val">'.$value['texto'].'</td>';
						 	
						 	echo '<td><button type="button" class="btn btn-primary btnActualizar" style="margin-right: 1rem;" id='.str_replace(' ', '_',$value['texto']).' >Actualizar</button><button type="button" class="btn btn-primary btnBorrar" id='.$value['texto'].' valor='.str_replace(' ', '_', $value['texto']).'>Borrar</button></td>';
						 	
						 	echo ' </tr>';

						}

			    	 ?>
			       
			        </tr>
			        
			        </tr>
			       
			    </tbody>
			</table>
		</div>
		
	</center>

	

	<script src="vista/js/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="vista/js/funciones.js"></script>
	
	<script type="text/javascript" src="vista/js/tabla.js"></script>


	


	
	

</body>
</html>