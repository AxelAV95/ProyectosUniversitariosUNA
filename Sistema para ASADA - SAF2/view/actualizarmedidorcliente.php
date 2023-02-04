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
        <div class="modalActualizar" id="modalmedidor" style="overflow:hidden;">
            <div class="modalActualizar-content  animated rollIn" style="width:50%; height: 50%; margin:15% auto;">
            <div id="titulo">
                    <center><h1 id="title-modal">Actualizar medidor</h1></center>
                    <span onclick="botonCancelar3()" style="font-size: 44px;" class="close">&times;</span>
                </div>
                <div style="">
                <form id="regForm"  class="form-horizontal" action="../business/clienteaction.php" method="post">
                <input type="hidden" name="actualizarmedidor" value="actualizarmedidor">
                <input required name="clienteid" type="hidden"  placeholder="ID" value='.$id.'>
                <label id="label-modal">Medidor</label>
                <input maxLength="10" required name="clientemedidor" type="text"  placeholder="Medidor" value="'.$data['clientemedidor'].'">
                    <div class="form-actions">
                        <center> <button style="background: #333; font-size: 23px; font-weight: bolder;" type="submit"  > Actualizar </button></center>
                    </div>
                </form>
                </div>
            </div>
        </div>
    ';
?>