<?php



if(isset($_GET['mensaje'])){
      $mensaje = $_GET['mensaje'];
   
    }
?>

<?php 

  include '../data/data.php';
    $pdo = Database::conectar();
    
    $sql2 = 'SELECT * FROM `tbvehiculo`';

    $combobit2 ="";
    $combobit2 .=" <option >"."--------------"."</option>"; 
    foreach ($pdo->query($sql2) as $row) {

        $combobit2 .=" <option value='".$row['vehiculoid']."'>".$row['vehiculoplaca']."</option>"; 
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

     <style type="text/css">

       input{
        width: 120px;
       }
       table {
  width: 30%;
  height: 100px;
}


     </style>
     <script src="js/jquery.min.js"></script>
</head>

<body>
  <div class="tabla">
    <div class="container">
            <div class="row">
                <h3>Marchamo</h3>
            </div>
            <div class="row">
               <p>

                <a href="../index.php" class="btn btn-success">Menú</a>
                </p>
                <table class="table table-striped table-bordered" >
                  <thead>
                    <tr>

                      <th>ID Vehiculo</th>
                      <th>Fecha de pago</th>
                      <th>Monto base</th>
                      <th>Monto por partes</th>
                      
                      <th>Interés</th>
                      <th>Monto neto</th>

                    </tr>
                  </thead>
                  <form class="form-horizontal" id="marchamoform" action="../business/marchamoaction.php" method="post">
                      <tr>

                    <td>
                      <select name="marchamovehiculoid" required="">
                        <?php echo $combobit2; ?>
                      </select>
                      </td>
                      <td><input required name="marchamofechapago" type="date"  placeholder="Fecha de pago" >
                            </td>
                    <section id="montos">
                      <td><input  required id="marchamomonto" name="marchamomonto" type="number"  placeholder="Monto base" min="1" max="9999999" maxlength="10">
                            </td>
                    <td><input required id="marchamomontopartes" name="marchamomontopartes" type="number" placeholder="Monto por partes"  min="0" max="9999999" >
                            </td>
                            <td><input id="marchamomultainteres" maxlength="9" required name="marchamomultainteres" type="number"  placeholder="Multa por interés" min="1" max="9999999">
                            </td>  
                    </section>
                    
                    
                            <td><input readonly  type="number" id="montoneto" name="montoneto" placeholder="Monto neto"></td>

                      
                      <td>
                      <input type="submit" value="Insertar" name="insertar" id="insertar"/> </td>

                      </tr>
                    </form>
                  <tbody>
                  <?php

                   $pdo = Database::conectar();
                   $sql = 'SELECT * FROM tbmarchamo';
                   echo '<section id="update">';
                   foreach ($pdo->query($sql) as $row) {
                    echo '<form method="post" enctype="multipart/form-data" action="../business/marchamoaction.php">';


                            echo '<tr>';
                            echo '<input type="hidden" name="marchamoid" value="' . $row['marchamoid'] . '">';
                            echo '<td><input readonly type="number" name="marchamovehiculoid" value="' . $row['marchamovehiculoid'] . '"></td>';
                             echo '<td><input type="date" name="marchamofechapago"  value="'. $row['marchamofechapago'] .  '"/></td>';
                            echo '<td><input  type="number"  id="marchamomontoupdate" name="marchamomonto" value="'. $row['marchamomonto'] . '"/></td>';
                            echo '<td><input id="marchamomontopartesupdate" type="number" name="marchamomontopartes"  value="'. $row['marchamomontopartes'] .  '"/></td>';
                           
                            echo '<td><input id="marchamomultainteresupdate" type="text" name="marchamomultainteres"  value="'. $row['marchamomultainteres'] .  '"/></td>';

                             echo '<td><input readonly type="text" id="montonetoupdate" name="montoneto"  value="'. $row['marchamomontoneto'] .  '"/></td>';

                            echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                            echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
                            echo '</tr>';
                            echo '</form>';
                   }

                   echo '</section>';
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
    

    $("#marchamomonto").change(function(){
     if(parseInt(this.value) > 9999999){
        
        this.value = '';
     } 
});
    $("#marchamomultainteres").change(function(){
     if(parseInt(this.value) > 9999999){
        
        this.value = '';
     } 
});

    $("#marchamomontopartes").change(function(){
     if(parseInt(this.value) > 9999999){
        
        this.value = '';
     } 
});
  </script>

  <script type="text/javascript">
    $("table #update").ready(function() {
      $("#marchamomontoupdate, #marchamomontopartesupdate,#marchamomultainteresupdate").on("keydown keyup", function() {
        
        var num1 = document.getElementById('marchamomontoupdate').value;
            var num2 = document.getElementById('marchamomontopartesupdate').value;
            var num3 = document.getElementById('marchamomultainteresupdate').value;
      var result = parseInt(num1) + parseInt(num2)+parseInt(num3);
      var result1 = parseInt(num2) - parseInt(num1)- parseInt(num3);
            if (!isNaN(result)) {
            //  alert(result);
                $('#montonetoupdate').val(result);
                 //$('#montoneto').val(result1);
        //document.getElementById('subt').value = result1;
            }


    });

});
  </script>


  <script type="text/javascript">
  
    $(document).ready(function() {
    //this calculates values automatically 
    sum();
    $("#marchamomonto, #marchamomontopartes,#marchamomultainteres").on("keydown keyup", function() {
        sum();
    });


     $("#marchamomonto").keyup(function() {
        var total = 0;  
if (!this.value) {
    


    if (!isNaN(total)) {

      var num1 = document.getElementById('marchamomonto').value;
            var num2 = document.getElementById('marchamomontopartes').value;
            var num3 = document.getElementById('marchamomultainteres').value;

        total=parseInt(num1) +parseInt(num2)+parseInt(num3);
            //  alert(result);
                $('#montoneto').val(total);
                 //$('#montoneto').val(result1);
        //document.getElementById('subt').value = result1;
            }

   
}});
   
    
});

function sum() {
            var num1 = document.getElementById('marchamomonto').value;
            var num2 = document.getElementById('marchamomontopartes').value;
            var num3 = document.getElementById('marchamomultainteres').value;
      var result = parseInt(num1) + parseInt(num2)+parseInt(num3);
      var result1 = parseInt(num2) - parseInt(num1)- parseInt(num3);
            if (!isNaN(result)) {
            //  alert(result);
                $('#montoneto').val(result);
                 //$('#montoneto').val(result1);
        //document.getElementById('subt').value = result1;
            }
        }


        function restar() {
            var num1 = document.getElementById('marchamomonto').value;
            var num2 = document.getElementById('marchamomontopartes').value;
            var num3 = document.getElementById('marchamomultainteres').value;
      var result = parseInt(num1) + parseInt(num2)+parseInt(num3);
      var result1 = parseInt(num2) - parseInt(num1)- parseInt(num3);
            if (!isNaN(result)) {
              alert(result);
                $('#montoneto').val(result1);
                 //$('#montoneto').val(result1);
        //document.getElementById('subt').value = result1;
            }
        }





  </script>


  </body>
</html>
