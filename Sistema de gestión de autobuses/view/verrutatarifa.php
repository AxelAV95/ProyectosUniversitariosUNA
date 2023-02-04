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
        $sql = "SELECT * FROM tbrutatarifa where rutatarifaid = ?";
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
                        <h3>Información de la sub-ruta <?php echo $data['rutatarifaid'];?> </h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Codigo de ruta</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['rutatarifarutaid'];?>
                            </label>
                        </div>
                      </div>
                      <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Ida o vuelta de ruta</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['rutatarifaidavuelta'];?>
                            </label>
                        </div>
                      </div>
                      <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Lugar sub-ruta</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['rutatarifalugares'];?>
                            </label>
                        </div>
                      </div>
                      <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Monto sub-ruta</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['rutatarifamonto'];?>
                            </label>
                        </div>
                      </div>

                        <div class="form-actions">
                          <a class="btn" href="rutatarifacrud.php">Back</a>
                       </div>
                                 
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>