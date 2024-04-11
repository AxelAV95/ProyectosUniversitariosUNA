<?php 
	
	//phpinfo();

	include_once "config.php"; 
   //$redis->del("listatexto"); 
   // $redis->lpush("listatexto", "Redis"); 
   // $redis->lpush("listatexto", "Mongodb"); 
   // $redis->lpush("listatexto", "Mysql");  
    $arList = $redis->lrange("listatexto", 0 ,-1);
    //print_r($arList); 


    $datos = array();
	//id,texto
	for ($i=0 ; $i < count($arList); $i++ ) { 
			
			$aux = array('id' => $i, 'texto' => $arList[$i]);
			array_push($datos,$aux);

	}
 // $datos = array(
 // 	array('id' => '1', 'texto' => 'Texto 1'),
 // 	array('id' => '2', 'texto' => 'Texto 2'),
 // 	array('id' => '3', 'texto' => 'Texto 3')
 // );

 // foreach ($datos as $key => $value) {
 //   //process element here;
 // 	echo $value['id'];
 // 	echo $value['texto'];

	// }

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

	<center><h2>Redis CRUD</h2></center>

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
						 	
						 	
						 	echo '<td><button type="button" class="btn btn-primary btnActualizar" style="margin-right: 1rem;" id='.$value['id'].' >Actualizar</button><button type="button" class="btn btn-primary btnBorrar" id='.$value['id'].' valor='.str_replace(' ', '_', $value['texto']).'>Borrar</button></td>';
						 	
						 	echo ' </tr>';

						}

			    	 ?>
			       
			        </tr>
			        
			        </tr>
			       
			    </tbody>
			</table>
		</div>
		
	</center>

	

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	

	<script type="text/javascript">
		
	</script>

	<script type="text/javascript">
		$(document).ready( function () {
    		$('#tablaTarea').DataTable({
    			"language": {
            	"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        	},
    		});
		} );


	</script>

	<script type="text/javascript">

		function actualizar(id){
			//alert(id);
			var texto = prompt('Ingrese su texto: ');
			var datos = new FormData();
			datos.append("tipo","actualizar");
			datos.append("id",id);
			datos.append("textoActualizar",texto);
			datos.append("key","listatexto");

			$.ajax({
					url:"operacionescrud.php",
					method: "POST",
					data: datos,
					cache: false,
					contentType: false,
					processData: false,
					success: function(respuesta){
						
						//alert(respuesta);
						window.location = "index.php";

					}

			})
		}
		
		function insertarTexto(){

			var texto = $('.texto').val();
			//alert(texto);

			

			var datos = new FormData();
			datos.append("tipo","insertar");
			datos.append("texto",texto);

			$.ajax({
					url:"operacionescrud.php",
					method: "POST",
					data: datos,
					cache: false,
					contentType: false,
					processData: false,
					success: function(respuesta){
						

						//alert(respuesta);
						window.location = "index.php";

					}

			})


		}

		function borrar(id,valor){

			var datos = new FormData();
			datos.append("tipo","borrar");
			datos.append("key","listatexto");
			datos.append("valor",valor);
			datos.append("id",id);

			$.ajax({
					url:"operacionescrud.php",
					method: "POST",
					data: datos,
					cache: false,
					contentType: false,
					processData: false,
					success: function(respuesta){
						

					//	alert(respuesta);
						window.location = "index.php";

					}

			})

		}


		
	</script>


	<script type="text/javascript">
		$("#tablaTarea tbody").on("click", ".btnActualizar", function(){

			var id = $(this).attr("id");
			actualizar(id);
			
		});

		$("#tablaTarea tbody").on("click", ".btnBorrar", function(){

			var id = $(this).attr("id");
			var valor = $(this).attr("valor");
			//alert(valor);

			borrar(id,valor);
			//actualizar(id);
			
		});


	</script>

	

</body>
</html>