<?php 
    include '../data/data.php';
    $pdo = Database::conectar();
    
    
    $id = $_GET['id'];
    if(isset($_GET['mensaje'])){
      $mensaje = $_GET['mensaje'];
   
    }


    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/jquery-ui.css">




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

.error {
  color: red;
  margin-left: 5px;
}


     </style>
</head>
 
<body>
  <div class="tabla">
    <div class="container">
            <div class="row">
                <h3>RTV</h3>
            </div>
            <a href="../index.php" class="btn btn-success">Menú</a>
             <div class="form-group">  
                     <form onsubmit="return(validar());" method="POST" name="rtvform" id="rtvform" action="../business/rtvaction.php">  
                          <div class="table-responsive">  
                               <table id="insert-table" class="table table-bordered" id="dynamic_field">
                                <!--EMPLEADOID - -->
                                <thead>
                                  <tr>
                      
                      <th>Empleado ID</th>
                      <th>Bus ID</th>
                      <th>Fecha vencimiento</th>
                      <th>Monto base</th>
                      <th>Monto acumulado</th>
                      <th>Estado</th>
                      
                    </tr>
                    <tbody>
                                </thead>
                                <td><input  id="empleadoid" name="empleadoid" type="text"  placeholder="Cédula" value="" autocomplete="off"></td>


                     <td><input readonly id="vehiculoid" name="vehiculoid" type="text" placeholder="ID Vehiculo" value="<?php echo $id?>">
                            </td>
                      <td><input id="fechaV" name="fechaV" type="date"  placeholder="Fecha vencimiento" value="">
                            </td>
                      
                      <td><input id="montobase" name="montobase" type="number"  placeholder="Monto base" value="">
                            </td>

                            <td><input id="montoacumulado" name="montoacumulado" type="number"  placeholder="Monto acumulado" value="">
                            </td>

                      

                     

   
                         <td><select style="width: 120px;" id="estado" name="estado">
                          <option value="0">Pendiente</option>
                          <option value="1">Aprobado</option>
                           </select></td>

                                         
                                         
                     <td> <input onclick="return(validar());" type="submit" value="Insertar" name="insertar" id="insertar"/> </td>
                                      
                            </tbody>
                               </table>  
                               
                          </div>  
                     </form>  
                </div>  
            <div class="row">
               
                <table id = "update-table" class="table table-striped table-bordered" >
                  <thead>
                    <tr>
                      <th>RTV ID</th>
                      <th>Empleado ID</th>
                      <th>Bus ID</th>
                      <th>Fecha vencimiento</th>
                      <th>Monto base</th>
                      <th>Monto acumulado</th>
                      <th>Estado</th>
                      <th>Acción</th>
                    </tr>
                  </thead>


                 
                  

  
                  <tbody>
                  <?php
                 //  echo $id;
                   $pdo = Database::conectar();
                   $sql = "SELECT * FROM tbrtv where rtvvehiculoid='".  $id ."'";
                   foreach ($pdo->query($sql) as $row) {
                    echo '<form id="rtvupdate" method="post" enctype="multipart/form-data" action="../business/rtvaction.php">';
                    
                            echo '<tr>';
                            echo '<td><input readonly type="number" name="rtvid" value="' . $row['rtvid'] . '"></td>';
                            echo '<td><input readonly   type="text" name="empleadoid" id="empleadoid" value="'. $row['rtvempleadoid'] . '"/></td>';
                            echo '<td><input readonly type="text" name="vehiculoid2" id="vehiculoid2" value="'. $row['rtvvehiculoid'] .  '"/></td>';
                            echo '<td><input type="date" name="fechaV" id="fechaV" value="'. $row['rtvfechavencimiento'] .  '"/></td>';
                            echo '<td><input type="text" name="montobase" id="montobase2" value="'. $row['rtvmontobase'] .  '"/></td>';
                            echo '<td><input readonly type="text" name="montoacumulado" id="montoacumulado" value="'. 
                            $row['rtvmontoacumulado'] .  '"/></td>';

                            //COMBOBOX
                            if($row['rtvestado'] == 0){
                              echo '<td><select style="width: 120px;" name="estado">';
                          echo '<option value="0" selected>Pendiente</option>';
                          echo '<option value="1">Aprobado</option>';
                           echo '</select></td>';
                            }else{
                              echo '<td><select style="width: 120px;" name="estado">';
                          echo '<option value="0">Pendiente</option>';
                          echo '<option value="1"selected>Aprobado</option>';
                           echo '</select></td>';
                            }
                           // echo '<td><input type="text" name="tipoLic" id="tipoLicencia" value=""</td>';
                           /* if($row['empleadolicenciaid']==1){
                              echo '<td><input type="text" name="tipoLic" id="tipoLicencia" value="'."A".'"</td>';
                            }else if($row['empleadolicenciaid']==2){
                              echo '<td><input type="text" name="tipoLic" id="tipoLicencia" value="'."B1".'"</td>';
                            }else if($row['empleadolicenciaid']==3){
                              echo '<td><input type="text" name="tipoLic" id="tipoLicencia" value="'."B2-B4".'"</td>';
                            }else if($row['empleadolicenciaid']==4){
                               echo '<td><input type="text" name="tipoLic" id="tipoLicencia" value="'."C".'"</td>';
                            }else if($row['empleadolicenciaid']==5){
                               echo '<td><input type="text" name="tipoLic" id="tipoLicencia" value="'."D".'"</td>';
                            }else if($row['empleadolicenciaid']==6){
                               echo '<td><input type="text" name="tipoLic" id="tipoLicencia" value="'."E".'"</td>';
                            }*/

                             
                         

                            
                            
                         
                            
                            
                               echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                                

                                
                                echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';

                             
                               /* echo '<a class="btn btn-danger" href="eliminarEmpleado.php?id='.$row['empleadoid'].'">Eliminar</a>';*/
                               
                            echo '</tr>';
                            echo '</form>';
                            // echo '<td><a href="licenciaview.php?id='.$id.'"><input  type="submit" value="Licencias" name="licencia" id="licencia"/></a></td>';

                   }
                   Database::desconectar();
                  ?>
                  </tbody>

            </table>
        </div>
    </div> <!-- /container -->
    </div>

   
 <script type="text/javascript">
   
 
    var variable='<?php echo $mensaje;?>'
 
    alert(variable);

 </script>


<script type="text/javascript">
  $(document).ready(function() {

  $('#rtvform').submit(function(e) {
    
    var empleadoid = $('#empleadoid').val();
    var vehiculoid= $('#vehiculoid2 ').val();
    var fechaV = $('#fechaV').val();
    var montobase = $('#montobase').val();
    var montoacumulado =$("#montoacumulado").val();
    var estado = $("#estado").val();
 
    
 
    if (empleadoid.length == "") {
      alert("Este campo es requerido.");
      $('#empleadoid').focus();
      e.preventDefault();
    }else if (fechaV.length == "") {
      alert("Este campo es requerido.");
      $('#fechaV').focus();
      e.preventDefault();
    }else if (montobase.length == "") {
      alert("Este campo es requerido.");

      $('#montobase').focus();
      e.preventDefault();
    }else if (montoacumulado.length =="") {
      alert("Este campo es requerido.");
      $('#montoacumulado').focus();
      e.preventDefault();
    }

    /*if (estado.length < 1) {
      alert("Este campo es requerido.");
      $('#estado').focus();
    } */
  });
 

});

</script>

<script type="text/javascript">
  $(document).ready(function() {

  $('#rtvupdate').submit(function(e) {
    
    //var empleadoid = $('#empleadoid').val();
    //var vehiculoid= $('#vehiculoid2 ').val();
    //var fechaV = $('#fechaV').val();
    var montobase = $('#montobase2').val();
    //var montoacumulado =$("#montoacumulado").val();
   // var estado = $("#estado").val();
 
    
 
     if (montobase.length == "") {
      alert("Este campo es requerido.");

      $('#montobase2').focus();
      e.preventDefault();
    }2

    /*if (estado.length < 1) {
      alert("Este campo es requerido.");
      $('#estado').focus();
    } */
  });
 

});

</script>




<script type="text/javascript">
  $(function() {
    $("#empleadoid").autocomplete({
        source: "fetchEmpleado.php",
        
    });
});
</script>

<script type="text/javascript">
  if($("#vehiculoid").val() == $("#vehiculoid2").val()){
    alert("Ya existe un registro de RTV para este vehiculo. Solo se podrá actualizar datos.");
    $('#insert-table').prop('hidden', true);
   // $('#update-table').prop('hidden',true);
  }else{
    //$('#insertar').prop('disabled', false);
    $('#update-table').prop('hidden',true);
  }
</script>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>



  </body>
</html>