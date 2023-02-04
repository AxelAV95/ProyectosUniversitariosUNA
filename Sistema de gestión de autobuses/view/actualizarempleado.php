<?php
    require '../data/data.php';
    
 
       $id = null;
       
         if ( !empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        }else{

        header("Location: empleadocrud.php");
    
        }

        include '../business/empleadoaction.php';
   
?>

<?php
    if ( null==$id ) {
        header("Location: ../index.php");
    } else {
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tb_empleados where empleadoid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::desconectar();
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Actualizar información de empleado <br>ID:  <?php echo $id?></h3>
                        
                    </div>
             
                    <form class="form-horizontal" action="actualizarempleado.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($cedulaError)?'error':'';?>">
                        
                        <div class="controls">
                          <input style="visibility:hidden" name="idemp" type="text"  placeholder="ID" value=<?php echo $id?> >
                            
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($cedulaError)?'error':'';?>">
                        <label class="control-label">Cédula</label>
                        <div class="controls">
                          
                            <input name="cedula" type="text"  placeholder="Cédula" value=" <?php echo $data['empleadocedula'];?>">
                            <?php if (!empty($cedulaError)): ?>
                                <span class="help-inline"><?php echo $cedulaError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                            <input name="nombre" type="text" placeholder="Nombre" value=" <?php echo $data['empleadonombre'];?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ape1Error)?'error':'';?>">
                        <label class="control-label">Primer apellido</label>
                        <div class="controls">
                            <input name="ape1" type="text"  placeholder="Primer apellido" value=" <?php echo $data['empleadoapellido1'];?>">
                            <?php if (!empty($ape1Error)): ?>
                                <span class="help-inline"><?php echo $ape1Error;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ape2Error)?'error':'';?>">
                        <label class="control-label">Segundo apellido</label>
                        <div class="controls">
                            <input name="ape2" type="text"  placeholder="Segundo apellido" value=" <?php echo $data['empleadoapellido2'];?>">
                            <?php if (!empty($ape2Error)): ?>
                                <span class="help-inline"><?php echo $ape2Error;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($telError)?'error':'';?>">
                        <label class="control-label">Teléfono</label>
                        <div class="controls">
                            <input name="tel" type="text"  placeholder="Teléfono" value=" <?php echo $data['empleadotelefono'];?>">
                            <?php if (!empty($telError)): ?>
                                <span class="help-inline"><?php echo $telError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($dirError)?'error':'';?>">
                        <label class="control-label">Dirección</label>
                        <div class="controls">
                            <input name="dir" type="text"  placeholder="Dirección" value=" <?php echo $data['empleadodireccion'];?>">
                            <?php if (!empty($dirError)): ?>
                                <span class="help-inline"><?php echo $dirError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($cuentaBError)?'error':'';?>">
                        <label class="control-label">Cuenta bancaria</label>
                        <div class="controls">
                            <input name="cuentaB" type="text"  placeholder="Cuenta bancaria" value=" <?php echo $data['empleadocuentabancaria'];?>">
                            <?php if (!empty($cuentaBError)): ?>
                                <span class="help-inline"><?php echo $cuentaBError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">Tipo de licencia</label>
                        <div class="controls">
                            <input name="tipoLic" type="text"  placeholder="Tipo de licencia si posee" value=" <?php   if($data['empleadolicenciaid']==1){
                              echo "A";
                            }else if($data['empleadolicenciaid']==2){
                              echo "B1";
                            }else if($data['empleadolicenciaid']==3){
                              echo "B2-B4";
                            }else if($data['empleadolicenciaid']==4){
                               echo "C";
                            }else if($data['empleadolicenciaid']==5){
                               echo "D";
                            }else if($data['empleadolicenciaid']==6){
                               echo "E";
                            }?>">
                            
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($cuentaBError)?'error':'';?>">
                        <label class="control-label">Tipo de empleado</label>
                        <div class="controls">
                            <input name="tipoEmp" type="text"  placeholder="Cuenta bancaria" value=" <?php echo $data['empleadotipo'];?>">
                            <?php if (!empty($cuentaBError)): ?>
                                <span class="help-inline"><?php echo $cuentaBError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button name="actualizar" type="submit" class="btn btn-success">Actualizar</button>
                          <a class="btn" href="empleadocrud.php">Regresar</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>