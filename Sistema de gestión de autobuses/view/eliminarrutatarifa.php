<?php
    
    $id = null;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }else{

        header("Location: ../index.php");
    
        }


     include '../business/rutatarifaaction.php';
     
    
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Eliminar RutaTarifa</h3>
                        
                    </div>
                     
                    <form class="form-horizontal" action="eliminarrutatarifa.php" method="post">
                      <input type="hidden" name="tarifaid" value="<?php echo $id?>"/>
                      <p class="alert alert-error">¿Está seguro que desea eliminarla?</p>
                      <div class="form-actions">
                          <button name="eliminar" type="submit" class="btn btn-danger">Sí</button>
                          <a class="btn" href="rutatarifacrud.php">No</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>