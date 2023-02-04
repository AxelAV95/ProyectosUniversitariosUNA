<?php
    require '../data/data.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: ../index.php");
    } else {
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbvehiculo where vehiculoid = ?";
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
                        <h3>Información del vehiculo</h3>
                    </div>
                     
                    <div class="form-horizontal" >
					
                      <div class="control-group">
                        <label class="control-label">Placa</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['vehiculoplaca'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Marca</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['vehiculomarca'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Modelo</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['vehiculomodelo'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Tipo</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['vehiculotipo'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Capacidad</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['vehiculocapacidad'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Estado</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['vehiculoestado'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Empleado</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['vehiculoempleadoid'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="vehiculocrud.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>