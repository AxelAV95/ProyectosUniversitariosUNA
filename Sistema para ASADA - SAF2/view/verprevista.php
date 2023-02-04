<?php
    include '../business/clienteaction.php';
       $id = null;
         if ( !empty($_POST['id'])) {  //_GET
            $id = $_POST['id'];//_REQUEST
        }else{
        header("Location: previstaview.php");
        }
        
    if ( null==$id ) {
        header("Location: ../previstaview.php");
    } else {
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbprevista INNER JOIN tbcliente where previstaclienteid = ? and tbcliente.clienteid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id,$id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::desconectar();
    }
    echo '
        <div class="modalVer">
            <div class="modalVer-content animated pulse" style="margin: 15% auto;">
            <div id="titulo">
            <center><h1 id="title-modal">Información del usuario</h1></center>
            <span onclick="botonCancelar2()"  class="close">&times;</span>
        </div>
                <form id="regForm" class="form-horizontal" action="" method="post">
                    
                <input readonly required required name="correo" type="text"  placeholder="Id Prevista" value="Prevista número: '.$data['previstaid'].'"/>
                
                <input readonly name="cedula" type="text"  placeholder="Cédula" value="Cédula: '.$data['clientecedula'].'"/>
                
                <input readonly name="nomb" type="text"  placeholder="Nombre" value="Nombre: '.$data['clientenombre'].'">
                
                <input readonly name="ape1" type="text"  placeholder="Apellido 1" value="Primer apellido: '.$data['clienteapellido1'].'">
                
                <input readonly name="ape2" type="text"  placeholder="Apellido 2" value="Segundo apellido: '.$data['clienteapellido2'].'">
                
                <input readonly name="corr" type="text"  placeholder="Correo" value="Correo: '.$data['clientecorreo'].'">
                
                <input readonly name="tele" type="text"  placeholder="Teléfono" value="Teléfono: '.$data['clientetelefono'].'">
                
                <input readonly name="dire" type="text"  placeholder="Dirección" value="Dirección: '.$data['clientedireccion'].'">
                
                <input readonly name="medi" type="text"  placeholder="Medidor" value="Medidor: '.$data['clientemedidor'].'">
                
                <input readonly name="casas" type="text"  placeholder="Casas" value="Num. de casas: '.$data['clientecasas'].'">
                
                <input readonly name="propi" type="text"  placeholder="Propiedades" value="Num. de propiedades: '.$data['clientepropiedades'].'">
                    
                <input readonly name="saldant" type="text"  placeholder="Saldo anterior" value="Saldo anterior: '.$data['previstasaldoanterior'].'">

                <input readonly name="aboact" type="text"  placeholder="Abono actual" value="Abono actual: '.$data['previstaabonoactual'].'">
               
                <input readonly name="saldact" type="text"  placeholder="Saldo actual" value="Saldo actual: '.$data['previstasaldoactual'].'">
                </form>
                
            </div>
        </div>
    ';
?>