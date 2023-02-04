<?php
    
    $idbus = null;
     
    if ( !empty($_GET['idbus'])) {
        $idbus = $_REQUEST['idbus'];
    }else{

        header("Location: ../index.php");
    
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
                        <h3>Eliminar un bus</h3>
                        
                    </div>
                     
                    <form class="form-horizontal" action="eliminarbus.php" method="post">
                      <input type="hidden" name="idbus" value="<?php echo $idbus?>"/>
                      <p class="alert alert-error">¿Está seguro que desea eliminarlo?</p>
                      <div class="form-actions">
                          <button name="eliminar" type="submit" class="btn btn-danger">Sí</button>
                          <a class="btn" href="buscrud.php">No</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>