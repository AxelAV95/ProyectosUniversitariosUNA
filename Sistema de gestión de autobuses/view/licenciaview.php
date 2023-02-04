<?php 
	
	include '../data/data.php';
    $pdo = Database::conectar();

    echo "Empleado ID: ".$_GET['id'];
	 $val = $_GET['id']; //OBTENGO EL ID DEL EMPLEADO
	 $contador = 0; //CUENTA EL NUMERO DE LICENCIAS QUE TIENE EL EMPLEADO
	 $sql ="SELECT * FROM `tblicencia` WHERE `licenciaempleadoid` ={$val}"; //SELECCIONA EL ID DEL EMPLEADO
    

   //RECORRE EL RESULTADO OBTENIDO, TOMA LAS LICENCIAS Y FECHAS DEL EMPLEADO
	foreach ($pdo->query($sql) as $row) {
        $licenciasEmpleado = explode(",", $row['licenciatipolicencia']); // se guardan 
        $licenciasFechas = explode(",", $row['licenciafechavencimiento']);

    }
    //COMBINA AMBOS ARREGLOS DE DATOS
    $array = array_combine($licenciasEmpleado, $licenciasFechas);

    
    //GUARDA LOS INPUTS CON LOS DATOS COMBINADOS
    $inputsAux ="";
    $i = 1;
    foreach ($array as $key => $value) {

      $inputsAux .= '<tr><td id="fila"><input type=text id="tipoLic'.$i.'" name="tipoLic[]" value="'.$key.'"/></td><td><input name=fechaV[] type=date value="'.$value.'"/></td></tr><br>';
      $contador++; //CUENTA LOS DATOS
       $i++;

    }

 
   //BOTON AGREGAR LICENCA
    $boton = "<td><button type=button name=agregarLicencia id=agregarLicencia class=btn btn-success>Agregar licencia</button>";


    
  


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
                <h3>Licencias</h3>
            </div>
            <a href="empleadocrud.php" class="btn btn-success">Volver</a>
            <?php echo "<br>"?>
             <div class="form-group">  
                     <form onsubmit="return(validar());" method="POST" name="empleadoform" id="empleadoform" action="../business/empleadoaction.php">  
                        <input type="hidden" name="empID" value="<?php echo $val?>">
                     	<?php 
                      echo "<br>";
                      echo $boton?>

                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field"> <tbody id="ajuste">
                                 
                                         <?php echo $inputsAux?>

                      <input type="submit" value="Actualizar" onclick="resultado();" name="actualizarLic" id="actualizarLic"/> 
                                      

                               </tbody>
                                
                                  
                            
                               </table>  
                               
                          </div>  
                     </form>  
                </div>  
		
		

   
	<script>  
    var array = [];
 $(document).ready(function(){  

      var i=0; 
      var con = <?php echo $contador?>; 
      $('#agregarLicencia').click(function(){  
            i++; 
           if(i <= 8-con){
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text"  id="tipoLic" name="tipoLic[]" placeholder="Ingrese licencia" class="form-control name_list" required onkeyup="this.value=NumText(this.value)" maxlength="2" /></td><td><input type="date" onchange ="myFunction()" id="fechaV" name="fechaV[]" class="form-control name_list" required/></td><td><button onclick="disable()" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" >X</button></td></tr>'); 
            
              
      //  array.push($("#dynamic_field > #ajuste> tr > td  > #tipoLic").val());
         // alert($(this).val());
    


            /*<select name=tipoLic><option value = A>Motos(A)</option><option value = B1>Automovil(B1)</option><option value = B2>Camion pequeño(B2)</option><option value = B3>Camión pesado(B3)</option><option value = B4>Camión articulado(B4)</option><option value = C>Autobus y taxi(C)</option><option value = D>Tractores y maquinaria(D)</option><option value = E>Licencia universal(E)</option></select>*/ 
          }else{
            alert("Máximo 8 campos.");
          }
           
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
        //   array.pop($("#dynamic_field > #ajuste> tr > td  > #tipoLic").val());
           i=0;
      });  
      
 });  


 </script>

 <script type="text/javascript">
  

   $(document).ready(function(){

   
    var v1 = $("#tipoLic1").val();
    var v2 = $("#tipoLic2").val();
    
    
    //array.push(v1);
    //array.push(v2);
  //  array.push(v3);
    var cantidad = document.getElementById("ajuste");
    //alert(parseInt(getCount(cantidad, false))); // G

   
    

    for(var h = 0; h < 8; h++){
      $("#dynamic_field > #ajuste> tr > td  > #tipoLic"+h).each(function(){
        array.push($(this).val());
         // alert($(this).val());
    });
     // alert(h);
    }

    /*for(var j = 0; j < array.length; j++){
      alert(array[j]);
    }*/
    
    /*$("#dynamic_field > #ajuste> tr > td  > #tipoLic"+1).each(function(){

          alert($(this).val());
    });*/
    //alert(v);

      var array2 = [];


        $("#dynamic_field").change(function(){
          for(var n = 0; n < 8; n++){
        $("#dynamic_field > tbody > #row"+n+" > td > #tipoLic").each(function(){
          
          for( var m = 0; m < 8; m++){
            if($(this).val() == array[m]){
              alert("Está licencia ya está ingresada. Por favor ingrese una no repetida.");
               $(this).focus( function() {
                $(this).val("");
                });

            }


          }

             
        
            //  $(this).val("");
              //alert($(this).val());
          
          });
      }
  });



});

















function getCount(parent, getChildrensChildren){
    var relevantChildren = 0;
    var children = parent.childNodes.length;
    for(var i=0; i < children; i++){
        if(parent.childNodes[i].nodeType != 3){
            if(getChildrensChildren)
                relevantChildren += getCount(parent.childNodes[i],true);
            relevantChildren++;
        }
    }
    return relevantChildren;
}

</script>

<script type="text/javascript">


  
  function NumText(string){//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = 'AB1B2B3B4CDE';//Caracteres validos
  
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
       out += string.charAt(i);
    return out;
}

</script>


</body>
</html>