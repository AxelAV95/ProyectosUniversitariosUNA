<?php 
include '../data/data.php';
    $pdo = Database::conectar();
    
    $sql2 = 'SELECT `tipoempleadoid`, `tipoempleadonombre` FROM `tbtipoempleado`';
   // $stmt = $pdo ->prepare($sql);
    //$stmt -> execute();
   // $data = $stmt->fetch(PDO::FETCH_ASSOC);

    //    $licenciasEmpleado = array();
    //    $licenciasEmpleado = explode(",", $trimLicenciasSeleccionadas); 
    /*$combobit="";
    

    foreach ($pdo->query($sql) as $row) {
        $combobit .=" <option value='".$row['empleadotipolicencia']."'>".$row['empleadotipolicencia']."</option>"; 
    }
*/
    $combobit2 ="";
    $combobit2 .=" <option >"."--------------"."</option>"; 
    foreach ($pdo->query($sql2) as $row) {

        $combobit2 .=" <option value='".$row['tipoempleadonombre']."'>".$row['tipoempleadonombre']."</option>"; 
    }


    if(isset($_GET['mensaje'])){
      $mensaje = $_GET['mensaje'];
   
    }


    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../css/bootstrp.min.css" rel="stylesheet">
    <script src="../js/boottrap.min.js"></script>
     <link rel="stylesheet" type="text/css" href="../css/esilo.css">
     <script src="js/jquery.min.js"></script>  
     <style type="text/css">
       
       input{
        width: 120px;
       }
       table {
  width: 30%;
  height: 100px;
}


     </style>
</head>
 
<body>
  <div class="tabla">
    <div class="container">
            <div class="row">
                <h3>Empleado</h3>
            </div>
            <a href="../index.php" class="btn btn-success">Menú</a>
             <div class="form-group">  
                     <form onsubmit="return(validar());" method="POST" name="empleadoform" id="empleadoform" action="../business/empleadoAction.php">  
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field"> 
                                
                                  <td><input id="cedula" name="cedula" type="text"  maxlength="9" placeholder="Cédula" value="<?php echo !empty($cedula)?$cedula:'';?>">
                            </td>
                     <td><input id="nombre" maxlength="30" name="nombre" type="text" placeholder="Nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            </td>
                      <td><input id="ape1" maxlength="30" name="ape1" type="text"  placeholder="Primer apellido" value="<?php echo !empty($ape1)?$ape1:'';?>">
                            </td>
                      
                      <td><input id="ape2" maxlength="30" name="ape2" type="text"  placeholder="Segundo apellido" value="<?php echo !empty($ape2)?$ape2:'';?>">
                            </td>

                       <td><input id="tel" maxlength="8" name="tel" type="text"  placeholder="Teléfono" value="<?php echo !empty($tel)?$tel:'';?>">
                            </td>
                      

                      <td><input id="dir" maxlength="100" name="dir" type="text"  placeholder="Dirección" value="<?php echo !empty($dir)?$dir:'';?>">
                            </td>
                     
                       <td><input id="cuentaB" maxlength="20" name="cuentaB" type="text"  placeholder="Cuenta bancaria" value="<?php echo !empty($cuentaB)?$cuentaB:'';?>">
                            </td>
                      


                                    

                                       <td><select id="tipoEmp" style="width: 120px;" name="tipoEmp">
       <?php echo $combobit2; ?>
   </select></td>
   
                                         
                                         <td><button type="button" name="agregarLicencia" id="agregarLicencia" class="btn btn-success">Agregar licencia</button></td>  
                                         <td>
                      <input onclick="return(validar());" type="submit" value="Insertar" name="insertar" id="insertar"/> </td>
                                      
                            
                               </table>  
                               
                          </div>  
                     </form>  
                </div>  
            <div class="row">
               
                <table class="table table-striped table-bordered" >
                  <thead>
                    <tr>
                      <th>Cédula</th>
                      <th>Nombre</th>
                      <th>Primer apellido</th>
                      <th>Segundo apellido</th>
                      <th>Telefono</th>
                      <th>Direccion</th>
                      <th>Cuenta bancaria</th>
                     
                       <th>Tipo de empleado</th>
                      <th>Acción</th>
                    </tr>
                  </thead>


                 
                  

  
                  <tbody>
                  <?php
                   
                   $pdo = Database::conectar();
                   $sql = 'SELECT * FROM tbempleado';
                   foreach ($pdo->query($sql) as $row) {
                    echo '<form  method="post" enctype="multipart/form-data" action="../business/empleadoaction.php">';
                    echo '<input type="hidden" name="idemp" value="' . $row['empleadoid'] . '">';
                            echo '<tr>';
                            echo '<td><input  type="text" name="cedula" id="cedula" value="'. $row['empleadocedula'] . '"/></td>';
                            echo '<td><input type="text" name="nombre" id="nombre" value="'. $row['empleadonombre'] .  '"/></td>';
                            echo '<td><input type="text" name="ape1" id="apellido1" value="'. $row['empleadoapellido1'] .  '"/></td>';
                            echo '<td><input type="text" name="ape2" id="apellido2" value="'. $row['empleadoapellido2'] .  '"/></td>';
                            echo '<td><input type="text" name="tel" id="telefono" value="'. 
                            $row['empleadotelefono'] .  '"/></td>';
                            echo '<td><input type="text" name="dir" id="direccion" value="'. $row['empleadodireccion'] .  '"/></td>';
                            echo '<td><input type="text" name="cuentaB" id="cuentaBancaria" value="'. $row['empleadocuentabancaria'] .  '"/></td>';
                           

                             echo '<td><select style="width: 120px;" name="tipoEmp">';
                              $combobit3 = "";
        foreach ($pdo->query($sql2) as $row2) {
          if($row['empleadotipo'] == $row2['tipoempleadoid']){
            $combobit3 .=" <option selected value='".$row2['tipoempleadonombre']."'>".$row2['tipoempleadonombre']."</option>";
          }else{
            $combobit3 .=" <option value='".$row2['tipoempleadonombre']."'>".$row2['tipoempleadonombre']."</option>";
          }
        
  

                            ; 
    }
    echo $combobit3;
    $id = $row['empleadoid'];
     echo '</select></td>';
                            
                               echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                                /*echo '<a class="btn" href="verEmpleado.php?id='.$row['empleadoid'].'">Ver</a>';
                                echo ' ';*/
                               

                                
                                echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';

                             
                               /* echo '<a class="btn btn-danger" href="eliminarEmpleado.php?id='.$row['empleadoid'].'">Eliminar</a>';*/
                               
                            echo '</tr>';
                            echo '</form>';
                             echo '<td><a href="licenciaview.php?id='.$id.'"><input  type="submit" value="Licencias" name="licencia" id="licencia"/></a></td>';

                   }
                   Database::desconectar();
                  ?>
                  </tbody>

            </table>
        </div>
    </div> <!-- /container -->
    </div>

      <script>  
 $(document).ready(function(){  
      var i=0;  
      $('#agregarLicencia').click(function(){  
           i++;  
           if(i <= 8){
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text"  id="tipoLic" name="tipoLic[]" placeholder="Ingrese licencia" class="form-control name_list" /></td><td><input type="date" onchange ="myFunction()" id="fechaV" name="fechaV[]" class="form-control name_list" /></td><td><button onclick="disable()" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 

            /*<select name=tipoLic><option value = A>Motos(A)</option><option value = B1>Automovil(B1)</option><option value = B2>Camion pequeño(B2)</option><option value = B3>Camión pesado(B3)</option><option value = B4>Camión articulado(B4)</option><option value = C>Autobus y taxi(C)</option><option value = D>Tractores y maquinaria(D)</option><option value = E>Licencia universal(E)</option></select>*/ 
          }else{
            alert("Máximo 8 campos.");
          }
           
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
           i=0;
      });  
      
 });  
 </script>
 <script type="text/javascript">
   
 
    var variable='<?php echo $mensaje;?>'
 
    alert(variable);

 </script>



<script type="text/javascript">
   <!--
      
      function validar()
      {
      
         if( document.empleadoform.cedula.value == "" ){
            alert( "Ingrese una cédula." );
            document.empleadoform.cedula.focus() ;
            return false;
         }

         if( document.empleadoform.nombre.value == "" ){
            alert( "Ingrese un nombre." );
            document.empleadoform.nombre.focus() ;
            return false;
         }

         if( document.empleadoform.ape1.value == "" ){
            alert( "Ingrese primer apellido" );
            document.empleadoform.ape1.focus() ;
            return false;
         }

          if( document.empleadoform.ape2.value == "" ){
            alert( "Ingrese segundo apellido" );
            document.empleadoform.ape2.focus() ;
            return false;
         }

          if( document.empleadoform.tel.value == "" ){
            alert( "Ingrese teléfono" );
            document.empleadoform.tel.focus() ;
            return false;
         }


          if( document.empleadoform.dir.value == "" ){
            alert( "Ingrese dirección" );
            document.empleadoform.dir.focus() ;
            return false;
         }

         if(document.getElementById("tipoLic").value.length == 0)
{
    alert("empty")
}

         if( document.empleadoform.tipoLic.value == "" ){
            alert( "Ingrese licencias" );
            document.empleadoform.tipoLic.focus() ;
            return false;
         }




         
         return( true );
      }
   //-->
</script>

<script type="text/javascript">
    
    document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('insertar').disabled = "true";
});
function myFunction() {
  var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
    var nameInput = document.getElementById('tipoLic').value;
    var nameInput2 = document.getElementById('fechaV').value;
    console.log(nameInput2);
    if ( nameInput2 == null) {
        document.getElementById('insertar').disabled = true;
    } else {
        document.getElementById('insertar').disabled = false;
    }
}

function disable() {
    
    document.getElementById("insertar").disabled = true;
}


</script>


<script type="text/javascript">
  $(document).ready(function(){
 $('#tipoEmp').change(function () {
 var tipo =  $('#tipoEmp').val();
 if(tipo == 'Chofer'){
  
  document.getElementById("insertar").disabled = true;

 }else{
  document.getElementById("insertar").disabled = false;
 }
})
})


    
 
  
  
</script>



  </body>
</html>