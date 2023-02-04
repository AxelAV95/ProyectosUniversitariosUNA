<?php 
	
	include '../data/data.php';
    $pdo = Database::conectar();

    echo "Id de horario: ".$_GET['id'];
	 $id = $_GET['id']; //OBTENGO EL ID DEL EMPLEADO
	 $contador = 0; //CUENTA EL NUMERO DE LICENCIAS QUE TIENE EL EMPLEADO
	 $sql ="SELECT * FROM `tbrutahorario` WHERE `rutahorarioid` ={$id}"; //SELECCIONA EL ID DEL EMPLEADO
    

   //RECORRE EL RESULTADO OBTENIDO, TOMA LAS LICENCIAS Y FECHAS DEL EMPLEADO
	foreach ($pdo->query($sql) as $row) {
        $horas = explode(",", $row['rutahorariohora']);

    }
    
    //GUARDA LOS INPUTS CON LOS DATOS COMBINADOS
    $inputsAux ="";
    $i = 1;
    foreach ($horas as $key => $value) {
      $inputsAux .= '<tr><td id="fila"><input type="time" id="hora"'.$i.'" name="hora[]" value="'.$value.'"/></td></tr><br>';
      $contador++; //CUENTA LOS DATOS
       $i++;

    }

 
   //BOTON AGREGAR LICENCA
    $boton = "<td><button type=button name=agregarHora id=agregarHora class=btn btn-success>Agregar Hora</button>";


    
  


?>
<!DOCTYPE html>
<html>
<head>
	<title>Licencias</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>
<body>


	<div class="tabla">
    <div class="container">
            <div class="row">
                <h3>Horas</h3>
            </div>
            <a href="horariocrud.php" class="btn btn-success">Volver</a>
            <?php echo "<br>"?>
             <div class="form-group">  
                     <form onsubmit="return(validar());" method="POST" name="horarioform" id="horarioform" action="../business/rutahorarioAction.php">  
                        <input type="hidden" name="idhorario" value="<?php echo $id?>">
                     	<?php 
                      echo "<br>";
                      echo $boton?>

                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field"> <tbody id="ajuste">
                                 
                                         <?php echo $inputsAux?>


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
      $('#agregarHora').click(function(){  
            i++; 
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="time" id="hora" name="hora[]" placeholder="Ingrese hora" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 

           
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
        //   array.pop($("#dynamic_field > #ajuste> tr > td  > #tipoLic").val());
           i=0;
      });  
      
 });  


 </script>

</body>
</html>