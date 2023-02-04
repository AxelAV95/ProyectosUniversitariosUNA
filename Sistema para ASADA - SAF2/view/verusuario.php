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
         $pdo -> exec("set names utf8");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbmultilogin INNER JOIN tbempleado where multiloginid = ? and tbempleado.empleadoid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id,$id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::desconectar();
    }
    $tipo = "";
    if($data['multilogintipousuario']==1){
        $tipo = 'Administrador';
    }else{
        $tipo = 'Usuario';
    }
    echo '
        <div class="modalVer">
            <div class="modalVer-content animated pulse" style="margin: 15% auto;">
            <div id="titulo">
            <center><h1 id="title-modal">Información del usuario</h1></center>
            <span onclick="botonCancelar2()" style="font-size: 44px;" class="close">&times;</span>
        </div>
                <form id="regForm" class="form-horizontal" action="" method="post">
                    
                <input readonly required required name="correo" type="text"  placeholder="Correo" value="'.$data['empleadocorreo'].'"/>
                <input required name="multiloginid" type="hidden"  placeholder="ID" value='.$id.'>
                <label id="label-modal">Contraseña</label>
                <input readonly maxLength="30" required name="pass" type="text"  placeholder="Nombre" value="'.$data['multiloginpassword'].'">
                <label id="label-modal">Tipo</label>
                <input readonly maxLength="30" required name="pass" type="text"  placeholder="Tipo usuario" value="'.$tipo.'">
                    
                </form>
                
            </div>
        </div>
    ';
?>