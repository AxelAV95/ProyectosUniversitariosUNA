<?php
    
    
 
       $idbus = null;
       
         if ( !empty($_GET['idbus'])) {
            $idbus = $_REQUEST['idbus'];
        }else{

        header("Location: buscrud.php");
    
        }

        include '../business/busaction.php';
   
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
                        <h3>Actualizar información de bus <br>Id del bus:  <?php echo $idbus?></h3>
                        
                    </div>
             
                    <form class="form-horizontal" action="actualizarbus.php?idbus=<?php echo $idbus?>" method="post">
                      <div class="control-group <?php echo !empty($idbusError)?'error':'';?>">
                        
                        <div class="controls">
                          <input style="visibility:hidden" name="idbus" type="text"  placeholder="Id del bus" value=<?php echo $idbus?> >
                            
                        </div>
                      </div>
					  
					  <div class="control-group <?php echo !empty($placaError)?'error':'';?>">
                        <label class="control-label">Placa</label>
                        <div class="controls">
                          
                            <input name="placa" type="text"  placeholder="Placa" value="<?php echo !empty($placa)?$placa:'';?>">
                            <?php if (!empty($placaError)): ?>
                                <span class="help-inline"><?php echo $placaError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                          
                            <input name="nombre" type="text"  placeholder="Nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  
                      <div class="control-group <?php echo !empty($marcaError)?'error':'';?>">
                        <label class="control-label">Marca</label>
                        <div class="controls">
                            <input name="marca" type="text" placeholder="Marca" value="<?php echo !empty($marca)?$marca:'';?>">
                            <?php if (!empty($marcaError)): ?>
                                <span class="help-inline"><?php echo $marcaError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  
                      <div class="control-group <?php echo !empty($modeloError)?'error':'';?>">
                        <label class="control-label">Modelo</label>
                        <div class="controls">
                            <input name="modelo" type="text"  placeholder="Modelo" value="<?php echo !empty($modelo)?$modelo:'';?>">
                            <?php if (!empty($modeloError)): ?>
                                <span class="help-inline"><?php echo $modeloError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  
                      <div class="control-group <?php echo !empty($tipoError)?'error':'';?>">
                        <label class="control-label">Tipo</label>
                        <div class="controls">
                            <input name="tipo" type="text"  placeholder="Tipo" value="<?php echo !empty($tipo)?$tipo:'';?>">
                            <?php if (!empty($tipoError)): ?>
                                <span class="help-inline"><?php echo $tipoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  
                      <div class="control-group <?php echo !empty($capacidadError)?'error':'';?>">
                        <label class="control-label">Capacidad</label>
                        <div class="controls">
                            <input name="capacidad" type="text"  placeholder="Capacidad" value="<?php echo !empty($capacidad)?$capacidad:'';?>">
                            <?php if (!empty($capacidadError)): ?>
                                <span class="help-inline"><?php echo $capacidadError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  
                      <div class="control-group <?php echo !empty($estadoError)?'error':'';?>">
                        <label class="control-label">Estado</label>
                        <div class="controls">
                            <input name="estado" type="text"  placeholder="Estado" value="<?php echo !empty($estado)?$estado:'';?>">
                            <?php if (!empty($estadoError)): ?>
                                <span class="help-inline"><?php echo $estadoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  
                      <div class="form-actions">
                          <button name="actualizar" type="submit" class="btn btn-success">Actualizar</button>
                          <a class="btn" href="buscrud.php">Regresar</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>