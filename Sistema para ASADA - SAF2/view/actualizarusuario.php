<?php
    include '../business/usuarioaction.php';
       $id = null;
         if ( !empty($_POST['id'])) {  //_GET
            $id = $_POST['id'];//_REQUEST
        }else{
        header("Location: usuarioview.php");
        }
        
    if ( null==$id ) {
        header("Location: ../usuarioview.php");
    } else {
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbmultilogin INNER JOIN tbempleado where multiloginid = ? and tbempleado.empleadoid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id,$id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::desconectar();
    }


$consultatipousuario = 'SELECT * FROM `tbtipousuario`';
    
    $combobit3 = "";
    
        foreach ($pdo->query($consultatipousuario) as $fila) {
          if($data['multilogintipousuario'] == $fila['tipousuarioid']){
            $combobit3 .=" <option selected value='".$fila['tipousuarioid']."'>".ucwords($fila['tipousuariodescripcion'])."</option>";
          }else{
            $combobit3 .=" <option value='".$fila['tipousuarioid']."'>".ucwords($fila['tipousuariodescripcion'])."</option>";
          }
}


    echo '
        <div class="modalActualizar"  style="overflow:hidden;">
            <div class="modalActualizar-content  animated rollIn" style="width:50%; height: 50%; margin:15% auto;">
            <div id="titulo">
                    <center><h1 id="title-modal">Actualizar usuario</h1></center>
                    <span onclick="botonCancelar()" style="font-size: 44px;" class="close">&times;</span>
                </div>
                <div style="">
                <form id="regForm"  class="form-horizontal" action="../business/usuarioaction.php" method="post">
                    <input type="hidden" name="actualizar" value="actualizar">
                    <label id="label-modal" >Correo</label>
                    <input readonly required required name="correo" type="text"  placeholder="Correo" value="'.$data['empleadocorreo'].'"/>
                    <input required name="multiloginid" type="hidden"  placeholder="ID" value='.$id.'>
                    <label id="label-modal">Contraseña</label>
                    <input maxLength="30" required name="pass" type="text"  placeholder="Nombre" value="'.$data['multiloginpassword'].'">
                    
                    
                    <label id="label-modal">Tipo de usuario</label>
                    <br>
                    <select style="width: auto;" name="tipo">
                     '. $combobit3.'
                     </select>
                    <div class="form-actions">
                        <center> <button style="background: #333; font-size: 23px; font-weight: bolder;" type="submit"  > Actualizar </button></center>
                    </div>
                </form>
                </div>
            </div>
        </div>
    ';
?>