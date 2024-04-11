<?php 
	include '../business/mangabusiness.php';
	include '../business/generobusiness.php';
	$mangaBusiness = new MangaBusiness();
    $generoBusiness = new GeneroBusiness();
    $generos = $generoBusiness->getAllTBGeneros(); //vuelvo a obtener todos los generos para el select

    $id = $_GET['mangaid']; //tomo el id del manga

	$idgeneros = $mangaBusiness->getMangaGeneros($id); //obtengo del manga todos sus id de generos de su columna
	$nombreAux = ""; //auxiliar para obtener nombre de genero

	$arrayAuxId = explode(",", $idgeneros); //todos los generos que obtuve, se les hace un split cuando
	//detecte una coma y se guarda como un elemento en el array

	$arrayAuxNombres = array(); //array auxiliar para almacenar los nombres de generos

	foreach($arrayAuxId as $id ){
	 	$nombreAux = $generoBusiness->getTBGenerosManga($id); //por cada id de genero obtenido busco su nombre tambien
	 	array_push($arrayAuxNombres,$nombreAux); //lo agrego al array
	}

	 $array = array_combine($arrayAuxId, $arrayAuxNombres); //combino ambos arrays de id's y nombres para crear uno de tipo id->valor
     

     //GUARDA LOS INPUTS CON LOS DATOS COMBINADOS
     //aqui tomo el array combinado y tomo id y nombre y los establezco en su input dinamico
     //tambien llevo un contador de cuantos generos tiene este manga
	  $inputsAux ="";
	  $contador = 0;
	    $i = 1;
	    foreach ($array as $key => $value) {
	    	//este input lo construyo y lo llamo con un echo en el formulario 
	      $inputsAux .= '<tr id="row'.$i.'" data-genero="'.$key.'" ><td><input type="hidden"  id="generoid" name="generos[]" value="'.$key.'" /><input type="text"  id="generoid" placeholder="'.$value.'" value="'.$value.'" /></td><td><button type="button" name="remove" id="'.$i.'" class="btn btn-danger btn_remove">X</button></td></tr>';
	      $contador++; //CUENTA LOS DATOS
	       $i++;

	    }


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<td>
        <select id="generos" name="generos" >
                <option value="">Seleccionar género</option>
                       <?php 
                            if(count($generos) > 0){ 
                                    foreach($generos as $current){
                                    echo '<option value="'.$current->getIdGenero().'">'.$current->getNombre().'</option>';

                                            
                                }
                            }
                        ?>
                        </select>
     </td>
     <td><button type="button" name="agregarGeneros" id="agregarGeneros" >Agregar géneros</button></td>
 	 <form onsubmit="return(validar());" method="POST" name="generosform" id="generosform" action="../business/mangaaction.php">  
 	 		<!-- GUARDO ID DEL MANGA EN UN INPUT DE TIPO HIDDEN -->
        	<input type="hidden" name="mangaid" value="<?php echo $_GET['mangaid']?>">

                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field"> <tbody >
                                 
                                         <?php 
                                         //AQUÍ LLAMO MIS INPUTS DINAMICOS CON SUS VALORES SETEADOS
                                         //DESDE LA BASE DE DATOS 
                                         echo $inputsAux;


                                         ?>

                      
                                      

                               </tbody>
                                
                                  
                            
                               </table>  
                               <td><input type="submit" value="Actualizar" name="actualizarGeneros" /></td> 
                               
                          </div>  
        </form>  

 	 <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

 	<script type="text/javascript">
 		 
 		 var contador = <?php echo $contador?>; //Tomo el contador del principio
 		 var generosManga = <?php echo json_encode($array); ?>;  //tambien tomo el array combinado (es decir los generos asociados al manga)
 		
 		//verifico y comparo cuales de los generos del array con el array general de generos, si son iguales entonces se deshabilita el option del select para que no se repita ni se vuelva a agregar
 		 $.each(generosManga, function(key, item) {
 		 	$("#generos > option").each(function() {
    			if($(this).val() == key){
    				$(this).attr('disabled','disabled');
    			}
			});
   			
		});
		 var i=contador ; //igualo a la cantidad de inputs dinamicos que ya hay
		 $(document).ready(function(){  

		      
		      //misma lógica de  mangaview, se hace uso del atributo "data-*" que permite setear valores personales dentro de un elemento html, en este caso es "data-genero"
		      $('#agregarGeneros').click(function(){

		      	if($('#generos option:selected').prop('disabled') == true || $('#generos option:selected').text() == "Seleccionar género"){
               			 alert("Error al agregar, verifique que no esté repetida o que haya elegido correctamente la opción.");
            	}else{
            		 var generoid = $("#generos option:selected").val();  
	                 var generonombre = $("#generos option:selected").text();  
	                 $("#generos option:selected").attr('disabled','disabled');
            		 i++;
		          
		           if(i <= 8){
		            $('#dynamic_field').append('<tr id="row'+i+'" data-genero="'+generoid+'"><td><input type="hidden"  id="generoid" name="generos[]" value="'+generoid+'" /><input type="text"  id="generoid" placeholder="'+generonombre+'" value="'+generonombre+'" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 
		            
		      
			        }else{
			            alert("Máximo 8 campos.");
			        }
            	}

		           
		           
		      });  
		 
		      
		 });

		 $(document).on('click', '.btn_remove', function(){ 
		   --i; 
		   
           var button_id = $(this).attr("id");
           var opcion = $( this ).parent().parent().attr('data-genero');
           $("#generos option[value=" + opcion + "]").removeAttr('disabled');     
            
           $('#row'+button_id+'').remove(); 
       
      });   


 	</script> 

 	<script type="text/javascript">
 		 
 	</script>
 
 </body>
 </html>