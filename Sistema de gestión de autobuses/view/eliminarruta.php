<?php
    
    $id = null;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }else{

        header("Location: ../index.php");
    
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
                        <h3>Eliminar una Ruta</h3>
                        
                    </div>
                     
                    <form class="form-horizontal" action="eliminarruta.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id?>"/>
                      <p class="alert alert-error">¿Está seguro que desea eliminarla?</p>
                      <div class="form-actions">
                          <button name="eliminar" type="submit" class="btn btn-danger">Sí</button>
                          <a class="btn" href="rutacrud.php">No</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>