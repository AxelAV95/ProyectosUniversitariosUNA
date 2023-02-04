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
        $sql = "SELECT * FROM tbcliente where clienteid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::desconectar();
    }
    $tipo = "";
    $estado = "";
    $tipo = $data['clientetipo'];
    $estado = $data['clienteestado'];

    if($tipo == 1){
        $tipo = "Emprego";
    }else if($tipo == 2){   
        $tipo = "Domipre";
    }else if($tipo == 3){
        $tipo = "Prevista";
    }

    if($estado == 1){
        $estado = "Activo";
    }else if($estado == 2){ 
        $estado = "Suspendido";
    }else if($estado == 3){
        $estado = "Otros";
    }

    if($tipo == "Emprego" || $tipo == "Domipre"){

        echo '
        <div class="modalVer">
            <div class="modalVer-content animated pulse" >
            <div id="titulo">
            <center><h1 id="title-modal">Información de cliente</h1></center>
            <span onclick="botonCancelar2()" style="font-size: 44px;" class="close">&times;</span>
        </div>
                <form id="regForm" class="form-horizontal" action="../business/clienteaction.php?id='.$id.'" method="post">
                    
                    
                    <input disabled name="cedula" type="text"  placeholder="Cédula" value="Cédula: '.$data['clientecedula'].'"/>
                    <input disabled name="id" type="hidden"  placeholder="ID" value='.$id.'>
                    
                    <input disabled name="nomb" type="text"  placeholder="Nombre" value="Nombre: '.$data['clientenombre'].'">
                    
                    <input disabled name="ape1" type="text"  placeholder="Apellido 1" value="Primer apellido: '.$data['clienteapellido1'].'">
                    
                    <input disabled name="ape2" type="text"  placeholder="Apellido 2" value="Segundo apellido: '.$data['clienteapellido2'].'">
                    
                    <input disabled name="corr" type="text"  placeholder="Correo" value="Correo: '.$data['clientecorreo'].'">
                    
                    <input disabled name="tele" type="text"  placeholder="Teléfono" value="Teléfono: '.$data['clientetelefono'].'">
                    
                    <input disabled name="dire" type="text"  placeholder="Dirección" value="Dirección: '.$data['clientedireccion'].'">
                    
                    <input disabled name="medi" type="text"  placeholder="Medidor" value="Medidor: '.$data['clientemedidor'].'">
                    
                    <input disabled name="casas" type="text"  placeholder="Casas" value="Num. de casas: '.$data['clientecasas'].'">
                    
                    <input disabled name="propi" type="text"  placeholder="Propiedades" value="Num. de propiedades: '.$data['clientepropiedades'].'">
                    
                    <input disabled name="tipo" type="text"  placeholder="Tipo" value="Tipo de cliente: '.$tipo.'">
                    <input disabled name="estado" type="text"  placeholder="Tipo" value="Estado: '.$estado.'">
                    
                </form>
                
            </div>
        </div>
    ';

    }else{
         echo '
        <div class="modalVer">
            <div class="modalVer-content animated pulse" >
            <div id="titulo">
            <center><h1 id="title-modal">Información de cliente</h1></center>
            <span onclick="botonCancelar2()" style="font-size: 44px;" class="close">&times;</span>
        </div>
                <form id="regForm" class="form-horizontal" action="../business/clienteaction.php?id='.$id.'" method="post">
                    
                    
                    <input disabled name="cedula" type="text"  placeholder="Cédula" value="Cédula: '.$data['clientecedula'].'"/>
                    <input disabled name="id" type="hidden"  placeholder="ID" value='.$id.'>
                    
                    <input disabled name="nomb" type="text"  placeholder="Nombre" value="Nombre: '.$data['clientenombre'].'">
                    
                    <input disabled name="ape1" type="text"  placeholder="Apellido 1" value="Primer apellido: '.$data['clienteapellido1'].'">
                    
                    <input disabled name="ape2" type="text"  placeholder="Apellido 2" value="Segundo apellido: '.$data['clienteapellido2'].'">
                    
                    <input disabled name="corr" type="text"  placeholder="Correo" value="Correo: '.$data['clientecorreo'].'">
                    
                    <input disabled name="tele" type="text"  placeholder="Teléfono" value="Teléfono: '.$data['clientetelefono'].'">
                    
                    <input disabled name="dire" type="text"  placeholder="Dirección" value="Dirección: '.$data['clientedireccion'].'">
                    
                    <input disabled name="medi" type="text"  placeholder="Medidor" value="Medidor: ">
                    
                    <input disabled name="casas" type="text"  placeholder="Casas" value="Num. de casas: ">
                    
                    <input disabled name="propi" type="text"  placeholder="Propiedades" value="Num. de propiedades: '.$data['clientepropiedades'].'">
                    
                    <input disabled name="tipo" type="text"  placeholder="Tipo" value="Tipo de cliente: '.$tipo.'">
                    <input disabled name="estado" type="text"  placeholder="Tipo" value="Estado: '.$estado.'">
                    
                </form>
                
            </div>
        </div>
    ';
    }   
    
    
?>