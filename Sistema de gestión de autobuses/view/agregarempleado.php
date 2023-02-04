
<?php 
  include '../business/empleadoaction.php';

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
                        <h3>Agregar empleado</h3>
                    </div>
             
                    <form class="form-horizontal" action="agregarempleado.php" method="post">
                      
                      <div class="control-group <?php echo !empty($cedulaError)?'error':'';?>">
                        <label class="control-label">Cédula</label>
                        <div class="controls">
                            <input name="cedula" type="text"  placeholder="Cédula" value="<?php echo !empty($cedula)?$cedula:'';?>">
                            <?php if (!empty($cedulaError)): ?>
                                <span class="help-inline"><?php echo $cedulaError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                            <input name="nombre" type="text" placeholder="Nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ape1Error)?'error':'';?>">
                        <label class="control-label">Primer apellido</label>
                        <div class="controls">
                            <input name="ape1" type="text"  placeholder="Primer apellido" value="<?php echo !empty($ape1)?$ape1:'';?>">
                            <?php if (!empty($ape1Error)): ?>
                                <span class="help-inline"><?php echo $ape1Error;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ape2Error)?'error':'';?>">
                        <label class="control-label">Segundo apellido</label>
                        <div class="controls">
                            <input name="ape2" type="text"  placeholder="Segundo apellido" value="<?php echo !empty($ape2)?$ape2:'';?>">
                            <?php if (!empty($ape2Error)): ?>
                                <span class="help-inline"><?php echo $ape2Error;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($telError)?'error':'';?>">
                        <label class="control-label">Teléfono</label>
                        <div class="controls">
                            <input name="tel" type="text"  placeholder="Teléfono" value="<?php echo !empty($tel)?$tel:'';?>">
                            <?php if (!empty($telError)): ?>
                                <span class="help-inline"><?php echo $telError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($dirError)?'error':'';?>">
                        <label class="control-label">Dirección</label>
                        <div class="controls">
                            <input name="dir" type="text"  placeholder="Dirección" value="<?php echo !empty($dir)?$dir:'';?>">
                            <?php if (!empty($dirError)): ?>
                                <span class="help-inline"><?php echo $dirError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($cuentaBError)?'error':'';?>">
                        <label class="control-label">Cuenta bancaria</label>
                        <div class="controls">
                            <input name="cuentaB" type="text"  placeholder="Cuenta bancaria" value="<?php echo !empty($cuentaB)?$cuentaB:'';?>">
                            <?php if (!empty($cuentaBError)): ?>
                                <span class="help-inline"><?php echo $cuentaBError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">Tipo de licencia</label>
                        <div class="controls">
                            <input name="tipoLic" type="text"  placeholder="Tipo de licencia si posee" value="">
                            
                        </div>
                      </div>

                       <div class="control-group">
                        <label class="control-label">Tipo de empleado</label>
                        <div class="controls">
                            <input name="tipoEmp" type="text"  placeholder="Tipo de licencia si posee" value="">
                            
                        </div>
                      </div>
                      
                      <div class="form-actions">
                          <button type="submit" name = "insertar" class="btn btn-success">Agregar</button>
                          <a class="btn" href="empleadocrud.php">Regresar</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
        