<?php
    include '../data/data.php';
    $pdo = Database::conectar();
    $sql = "SELECT tbempleado.empleadoid, tbempleado.empleadonombre, tbempleado.empleadoapellido1, tbempleado.empleadoapellido2 FROM tbempleado
INNER JOIN tbtipoempleado ON  tbempleado.empleadotipo = tbtipoempleado.tipoempleadoid WHERE  tbtipoempleado.tipoempleadoid = (SELECT `tipoempleadoid` FROM `tbtipoempleado` WHERE `tipoempleadonombre` = 'Mecanico')";

  $consultavehiculos = "SELECT * FROM `tbvehiculo`";


  $combobit ="";
$combobit .= "<option required />";
    foreach ($pdo->query($sql) as $row) {
        $combobit .=" <option value='".$row['empleadoid']."'>".$row['empleadonombre']." ".$row['empleadoapellido1']." ".$row['empleadoapellido2']."</option>";
    }

    $combobit2 = "";
    $combobit2 .= "<option required />";
    foreach ($pdo->query($consultavehiculos) as $row) {
        $combobit2 .=" <option value='".$row['vehiculoid']."'>".$row['vehiculoplaca']."</option>";
    }


    if(isset($_GET['mensaje'])){
      $mensaje = $_GET['mensaje'];
   
    }
 
    /*
    SELECT tbempleado.empleadoid
FROM tbempleado
INNER JOIN tbtipoempleado ON  tbempleado.empleadotipo = tbtipoempleado.tipoempleadoid WHERE  tbtipoempleado.tipoempleadoid = 4
    */


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../css/bootstrp.min.css" rel="stylesheet">
    <script src="../js/boottrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
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
                <h3>Mantenimiento</h3>
            </div>
            <a href="../index.php" class="btn btn-success">Menú</a>
            <a href="historicoreparacionesview.php" class="btn btn-success">Historial de reparaciones</a>
            <br><br>
             <div class="form-group" style="border: 1px solid black; width: 1100px; ">
                     <form onsubmit="return(validar());" method="POST" name="mantenimientoform" id="mantenimientoform" action="../business/mantenimientoaction.php" style="padding: 10px 30px 30px 30px ">

                            <table class="table table-bordered" id="dynamic_field">

                            <!--<td> <input type="hidden" name="mantenimiendoid" placeholder="Mantenimiento ID"></td>-->
                            <tr>
                              <td>
                                <label>Placa:</label>
                              <select  required name="mantenimientovehiculoid">
                                <?php echo $combobit2 ?>
                              </select>

                             </td>
                            <td>
                              <label>Empleado:</label>
                              <select name="mantenimientoempleadoid">
                                <?php echo $combobit ?>
                              </select>

                             </td>
                            <td>
                              <label>Inicio:</label>
                              <input type="date" name="mantenimientofechainicio" id="mantenimientofechainicio" placeholder="Fecha inicio" required /></td>
                            <td>
                              <label>Fin:</label>
                              <input type="date" name="mantenimientofechafin" id="mantenimientofechafin" placeholder="Fecha fin" /></td>
                            <td>

                              <textarea type="text" name="mantenimientodetallecostounitario" id="mantenimientodetallecostounitario" placeholder="Detalles" rows="5" cols="30" required></textarea></td>
                            <td><button type="button" name="agregarCostoUnitario" id="agregarCostoUnitario" class="btn btn-success">Agregar costo unitario</button></td>
                            <!--<td><button type="button"   name="calculartotal" id="calculartotal" class="btn btn-success">Calcular costo total</button></td>-->
                                         <td>
                            <td>
                              <label>Total:</label>
                              <input type="text" name="mantenimientocostototal" id="mantenimientocostototal" placeholder="Costo total" /></td>


                           </tr>


                        </table>
                        <br>
                            <td style="padding-top: 10px; "><section style="border: 1px solid black; width: 290px; padding: 10px 10px 30px 0px" >
                              <tr >
                              <td><input type="checkbox" id="actividad" name="actividad[]" value="Frenos" />Frenos</td>
                              <td><input type="checkbox" id="actividad" name="actividad[]" value="Carroceria" />Carrocería</td>
                              <td><input type="checkbox" id="actividad" name="actividad[]" value="Motor" />Motor</td>
                              <td><input type="checkbox" id="actividad" name="actividad[]" value="Rotulas" />Rotulas y suspensión</td>

                              </tr>
                            </section></td>
                            <br> <br>

                            <td><input  type="submit" value="Insertar" name="insertar" id="insertar"/> </td>

                     </form>
                </div>

            <div class="row" style="margin-top: 60px;">

                <table class="table table-striped table-bordered" border="1" >
                  <thead >
                    <tr >
                      <th>ID</th>
                      <th>Vehiculo ID</th>
                      <th>Empleado ID</th>
                      <th>Fecha inicio</th>
                      <th>Fecha fin</th>
                      <th>Costo unitario</th>
                      <th>Detalle costo unitario</th>

                       <th>Costo total</th>
                       <th>Frenos</th>
                       <th>Carroceria</th>
                       <th>Motor</th>
                       <th>Rotulas y suspensión</th>
                      <th>Actualizar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>






                  <tbody>
                  <?php

                   $pdo = Database::conectar();
                   $sql = 'SELECT * FROM tbmantenimiento';
                   foreach ($pdo->query($sql) as $row) {
                    echo '<form  method="post" enctype="multipart/form-data" action="../business/mantenimientoaction.php">';

                            echo '<tr>';
                            echo '<td><input type="text" name="id" value="' . $row['mantenimientoid'] . '" readonly="readonly"></td>';
                            echo '<td><input  type="text" name="mantenimientovehiculoid" id="mantenimientovehiculoid" value="'. $row['mantenimientovehiculoid'] . '" readonly="readonly" /></td>';

                              echo '<td><input  type="text" name="empleado" id="empleado" value="'. $row['mantenimientoempleadoid'] . '" readonly="readonly" /></td>';
                            echo '<td><input type="date" name="mantenimientofechainicio" id="mantenimientofechainicio" value="'. $row['mantenimientofechainicio'] .  '"/></td>';

                            echo '<td><input type="date" name="fin" id="fin" value="'. $row['mantenimientofechafin'] .  '"/></td>';

                            echo '<td><input type="text" name="costo" id="costo" value="'. $row['mantenimientocostounitario'] .  '"/></td>';

                            echo '<td><input type="text" name="detalle" id="detalle" value="'. $row['mantenimientodetallecostounitario'] .  '"/></td>';

                            echo '<td><input type="text" name="mantenimientocostototal" id="mantenimientocostototal" value="'. $row['mantenimientocostototal'] .  '" readonly="readonly" /></td>';

                            echo '<td><input type="number" name="frenos" id="frenos" value="'. $row['mantenimientofrenos'] .  '" min="0" max="1" /></td>';

                             echo '<td><input type="number" name="carroceria" id="carroceria" min="0" max="1" value="'. $row['mantenimientocarroceria'] .  '"/></td>';

                            echo '<td><input  min="0" max="1" type="number" name="motor" id="motor" value="'. $row['mantenimientomotor'] .  '"/></td>';

                            echo '<td><input min="0" max="1" type="number" name="rotula" id="rotula" value="'. $row['mantenimientorotulasuspension'] .  '"/></td>';

                            echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                            echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';


                            echo '</form>';


                   }
                   Database::desconectar();
                  ?>
                  </tbody>

            </table>
        </div>
    </div>
</div>
    <br><br><br>



<script type="text/javascript">
  function esnulo(v){
    if(isNaN(v)){
         return 0;
    }else{
        return v;
    }
}

</script>
<script type="text/javascript">
  var total = 0;
  function sumar(){

    $('#dynamic_field #costosunitarios').each(function(){
    total += parseInt($(this).val());


    });

    $("#mantenimientocostototal").val(esnulo(total));

      if($("#mantenimientocostototal").val()==0){
         $("#insertar").attr('disabled','disabled');
      }else{
         $("#insertar").removeAttr('disabled');
      }
    //alert(total);
    total = 0;
    //$("#total").val(totalPoints);

  }
</script>

 <script>

    $(document).ready(function(){
        $("#mantenimientocostototal").attr('readonly','readonly');
       $("#insertar").attr('disabled','disabled');

    });




  $(document).ready(function(){
    $('#calculartotal').click(function(){
       sumar();

    });
  });
</script>

    <script>
 $(document).ready(function(){
      var i=0;
      $('#agregarCostoUnitario').click(function(){
           i++;
           if(i <= 8){
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="number"  id="costosunitarios" name="costosunitarios[]" placeholder="Ingrese costos unitarios" class="form-control name_list" required /></td><td><button onclick="disable()" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

            /*<select name=tipoLic><option value = A>Motos(A)</option><option value = B1>Automovil(B1)</option><option value = B2>Camion pequeño(B2)</option><option value = B3>Camión pesado(B3)</option><option value = B4>Camión articulado(B4)</option><option value = C>Autobus y taxi(C)</option><option value = D>Tractores y maquinaria(D)</option><option value = E>Licencia universal(E)</option></select>*/
          }else{
            alert("Máximo 8 campos.");
          }

      });
      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           var valor =  $('#row'+button_id+' input').val();

           $('#row'+button_id+'').remove();
           //$('#row'+button_id+' input').val();

           $("#mantenimientocostototal").val($("#mantenimientocostototal").val()-valor);
           var actual = $("#mantenimientocostototal").val();
           //alert(actual);
           $("#mantenimientocostototal").attr('readonly','readonly');

           if(actual == 0){
            $("#insertar").attr('disabled','disabled');
      }

           i=0;
      });

 });
 </script>


<script type="text/javascript">
  //var total = 0;
  $('#mantenimientoform').on('click', function (e) {
    if ($(e.target).closest("#costosunitarios").length === 0) {
     //   $("#mantenimientocostototal").attr('disabled','disabled');
        sumar();


    }


});
  $("#mantenimientocostototal").val(total);
</script>

 <script type="text/javascript">
  /*function testcheck()
{
    if (!jQuery("#actividad").is(":checked")) {
        alert("No se ha seleccionado una actividad de mantenimiento.");
        return false;
    }
    return true;
}*/

</script>


<script type="text/javascript">
   
 
    var variable='<?php echo $mensaje;?>'
 
    alert(variable);

 </script>

 <script type="text/javascript">
    
  $("#mantenimientoform").change(function(){
    var startDt=document.getElementById("mantenimientofechainicio").value;
var endDt=document.getElementById("mantenimientofechafin").value;

if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
{
    alert("La fecha final no debe ser menor que la actual");
    $("#mantenimientofechafin").val('');
}
if((new Date(startDt).getTime() == new Date(endDt).getTime())){

  alert("Las fechas no pueden ser iguales.");
    $("#mantenimientofechafin").val('');
    $("#mantenimientofechainicio").val('');

}




  });
  


 </script>

 
 



  </body>
</html>
