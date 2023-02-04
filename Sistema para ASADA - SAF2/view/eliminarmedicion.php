<?php
    include '../business/clienteaction.php';
       $id = null;
         if ( !empty($_POST['id'])) {  //_GET
            $id = $_POST['id'];//_REQUEST
        }else{
        header("Location: clienteview.php");
        }
        
    if ( null==$id ) {
        header("Location: ../clienteview.php");
    } else {
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbcliente where clienteid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::desconectar();
    }
    echo '
        <div class="modalEliminar">
            <div class="modalEliminar-content">
            <br><h1>ELIMINAR<h1><br><br><br>
                <form class="form-horizontal" action="../business/clienteaction.php?id='.$id.'" method="post">
                <input type="hidden" name="idcli" value="'.$id.'"/>
                    <div class="form-actions">
                        <button name="eliminar" type="submit" class="btn btn-success">Eliminar</button>
                    </div>
                </form>
                <button class="cancelar" id="cancelar" class="btn btn-success" onclick="botonCancelar()" >Cancelar</button>
            </div>
        </div>
    ';
?>