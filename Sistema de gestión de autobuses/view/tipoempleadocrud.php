<?php 
include '../data/data.php';
 

    
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
            <div class="row">
               <p>
                    
                    <a href="../index.php" class="btn btn-success">Menú</a>
                </p>
                <table class="table table-striped table-bordered" >
                  <thead>
                    <tr>
                      
                      <th>Nombre</th>
                      
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <form onsubmit="return(validar());" name="tipoempleadoform" class="form-horizontal" action="../business/tipoempleadoaction.php" method="post">
                      <tr>
                      
                      
                   
                     <td><input maxlength="15" required name="nombre" type="text" placeholder="Nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            </td>
                      
                      
                      <td><input type="submit" value="Insertar" name="insertar" id="insertar"/> </td>
                      
                      </tr>
                    </form>
                  <tbody>
                  <?php
                   
                   $pdo = Database::conectar();
                   $sql = 'SELECT * FROM `tbtipoempleado`';
                   foreach ($pdo->query($sql) as $row) {
                    echo '<form method="post" enctype="multipart/form-data" action="../business/tipoempleadoaction.php">';
                    echo '<input type="hidden" name="idtipoemp" value="' . $row['tipoempleadoid'] . '">';
                            echo '<tr>';
                            
                            echo '<td><input type="text" name="nombre" id="nombre" value="'. $row['tipoempleadonombre'] .  '"/></td>';
                            

                            
                               echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                                /*echo '<a class="btn" href="verEmpleado.php?id='.$row['empleadoid'].'">Ver</a>';
                                echo ' ';*/
                               
                                
                                echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
                               /* echo '<a class="btn btn-danger" href="eliminarEmpleado.php?id='.$row['empleadoid'].'">Eliminar</a>';*/
                               
                            echo '</tr>';
                            echo '</form>';
                   }
                   Database::desconectar();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
    </div>


    <script type="text/javascript">
   <!--
      
      function validar()
      {
      
         if( document.tipoempleadoform.nombre.value == "" ){
            alert( "Ingrese un nombre." );
            document.tipoempleadoform.nombre.focus() ;
            return false;
         }

         



         
         return( true );
      }
   //-->
</script>

<script type="text/javascript">
   
 
    var variable='<?php echo $mensaje;?>'
 
    alert(variable);

 </script>


  </body>
</html>