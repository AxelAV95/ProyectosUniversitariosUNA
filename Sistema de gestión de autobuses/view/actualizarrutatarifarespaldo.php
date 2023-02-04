<?php 
	
	include '../data/data.php';
    $pdo = Database::conectar();

    echo "Id de sub ruta: ".$_GET['id'];
	 $id = $_GET['id']; //OBTENGO EL ID DEL EMPLEADO
     $contador = 0; //CUENTA EL NUMERO DE LICENCIAS QUE TIENE EL EMPLEADO
     $contador2 = 0;
	 $sql ="SELECT * FROM `tbrutatarifa` WHERE `rutatarifaid` ={$id}"; //SELECCIONA EL ID DEL EMPLEADO
    

   //RECORRE EL RESULTADO OBTENIDO, TOMA LAS LICENCIAS Y FECHAS DEL EMPLEADO
	foreach ($pdo->query($sql) as $row) {
        $lugares = explode("-", $row['rutatarifalugares']);
    }
    foreach ($pdo->query($sql) as $row) {
        $montos = explode("-", $row['rutatarifamonto']);
    }
    
    //GUARDA LOS INPUTS CON LOS DATOS COMBINADOS
    $inputsAux ="Lugares:";
    $i = 1;
    foreach ($lugares as $key => $value) {
      $inputsAux .= '<td id="fila"><input type="text" id="lugar"'.$i.'" name="lugar[]" value="'.$value.'"/>';
      $contador++; //CUENTA LOS DATOS
       $i++;
    }
    $inputsAux2 ="Montos: ";
    $ii = 1;
    foreach ($montos as $key => $value) {
      $inputsAux2 .= '<td id="fila"><input type="text" id="monto"'.$ii.'" name="monto[]" value="'.$value.'"/>';
      $contador2++; //CUENTA LOS DATOS
       $ii++;
    }

 
   //BOTON AGREGAR LICENCA
    $boton = "<td><button type=button name=agregarSub id=agregarSub class=btn btn-success>Agregar Subruta</button>";


    
  


?>
<!DOCTYPE html>
<html>
<head>
	<title>Subrutas</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
     
</head>
<body>


	<div class="tabla">
    <div class="container">
            <div class="row">
                <h3>Horas</h3>
            </div>
            <a href="rutatarifacrud.php" class="btn btn-success">Volver</a>
            <?php echo "<br>"?>
             <div class="form-group">  
                     <form onsubmit="return(validar());" method="POST" name="rutatarifaform" id="rutatarifaform" action="../business/rutatarifaaction.php">  
                        <input type="hidden" name="id" value="<?php echo $id?>">
                     	<?php 
                      echo "<br>";
                      echo $boton?>

                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field"> <tbody id="ajuste">
                                 
                                        <?php 
                                            echo '<td>' .$inputsAux; '</td>';
                                            echo '<tr>';
                                            echo '<td>' .$inputsAux2; '</td>'
                                        ?> 
                             
                               </tbody>
                                
                                  
                            
                               </table>  
                               
                          </div>  
						  <input type="submit" value="Actualizar" name="actualizar" id="actualizar"/> 
                     </form>  
                </div>  
		
		

   
	<script>  
    var array = [];
 $(document).ready(function(){  

      var i=0; 
      var con = <?php echo $contador?>; 
      $('#agregarSub').click(function(){  
            i++; 
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" id="lugar" name="lugar[]" placeholder="Ingrese lugar" class="form-control name_list" /></td><td><input type="number" id="monto" name="monto[]" placeholder="Ingrese monto" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 

           
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
           i=0;
      });  
      
 });  


 </script>

</body>
</html>