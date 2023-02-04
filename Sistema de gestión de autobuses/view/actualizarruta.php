<?php
    
    
 
       $id = null;
       
         if ( !empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        }else{

        header("Location: rutacrud.php");
    
        }

        include '../business/rutaaction.php';
   
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
                        <h3>Actualizar información de ruta <br>ID:  <?php echo $id?></h3>
                        
                    </div>
             
                    <form class="form-horizontal" action="actualizarruta.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($idrutaError)?'error':'';?>">
                        
                        <div class="controls">
                          <input style="visibility:hidden" name="idru" type="text"  placeholder="ID" value=<?php echo $id?> >
                            
                        </div>
                      </div>
                      
                     
                      <div class="control-group <?php echo !empty($salidaError)?'error':'';?>">
                        <label class="control-label">Lugar Salida</label>
                        <div class="controls">
                            <input name="salida" type="text" placeholder="Lugar Salida" value="<?php echo !empty($salida)?$salida:'';?>">
                            <?php if (!empty($salidaError)): ?>
                                <span class="help-inline"><?php echo $salidaError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($destinoError)?'error':'';?>">
                        <label class="control-label">Lugar Destino</label>
                        <div class="controls">
                            <input name="destino" type="text"  placeholder="Lugar Destino" value="<?php echo !empty($destino)?$destino:'';?>">
                            <?php if (!empty($destinoError)): ?>
                                <span class="help-inline"><?php echo $destinoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($tarifaError)?'error':'';?>">
                        <label class="control-label">Tarifa</label>
                        <div class="controls">
                            <input name="tarifa" type="text"  placeholder="Tarifa" value="<?php echo !empty($tarifa)?$tarifa:'';?>">
                            <?php if (!empty($tarifaError)): ?>
                                <span class="help-inline"><?php echo $tarifaError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($tiempoError)?'error':'';?>">
                        <label class="control-label">Tiempo promedio</label>
                        <div class="controls">
                            <input name="tiempo" type="text"  placeholder="Tiempo promedio" value="<?php echo !empty($tiempo)?$tiempo:'';?>">
                            <?php if (!empty($tiempoError)): ?>
                                <span class="help-inline"><?php echo $tiempoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="form-actions">
                          <button name="actualizar" type="submit" class="btn btn-success">Actualizar</button>
                          <a class="btn" href="rutacrud.php">Regresar</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>