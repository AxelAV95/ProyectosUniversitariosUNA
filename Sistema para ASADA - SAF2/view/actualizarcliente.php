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


$consultatipocliente = 'SELECT * FROM `tbtipocliente`';
$consultatipoestado = 'SELECT * FROM `tbestado`';
    
    $combobit3 = "";
    $combobit4 = "";
    
        foreach ($pdo->query($consultatipocliente) as $fila) {
          if($data['clientetipo'] == $fila['tipoclienteid']){
            $combobit3 .=" <option selected value='".$fila['tipoclienteid']."'>".$fila['tipoclientenombre']."</option>";
          }else{
            $combobit3 .=" <option value='".$fila['tipoclienteid']."'>".$fila['tipoclientenombre']."</option>";
          }
        }

        foreach ($pdo->query($consultatipoestado) as $fila) {
            if($data['clienteestado'] == $fila['estadoid']){
              $combobit4 .=" <option selected value='".$fila['estadoid']."'>".$fila['estadodescripcion']."</option>";
            }else{
              $combobit4 .=" <option value='".$fila['estadoid']."'>".$fila['estadodescripcion']."</option>";
            }
          }
  


    echo '
        <div class="modalActualizar"  style="overflow:hidden;">
            <div class="modalActualizar-content  animated rollIn" style="width:50%; height: 90%; margin-top: 32px;">
            <div id="titulo">
                    <center><h1 id="title-modal">Actualizar cliente</h1></center>
                    <span onclick="botonCancelar()" style="font-size: 44px;" class="close">&times;</span>
                </div>
                <div style="">
                <form id="regForm"  class="form-horizontal" action="../business/clienteaction.php" method="post">
                    <input type="hidden" name="actualizar" value="actualizar">
                    <label id="label-modal" >Cédula</label>
                    <input   maxlength=9  name="clientecedula" type="text"  placeholder="Cédula" value="'.$data['clientecedula'].'"/>
                    <input required name="clienteid" type="hidden"  placeholder="ID" value='.$id.'>
                    <label id="label-modal">Nombre</label>
                    <input maxLength="30" required name="clientenombre" type="text"  placeholder="Nombre" value="'.$data['clientenombre'].'">
                    <label id="label-modal">Primer apellido</label>
                    <input maxLength="30" required name="clienteapellido1" type="text"  placeholder="Apellido 1" value="'.$data['clienteapellido1'].'">
                    <label id="label-modal">Segundo apellido</label>
                    <input maxLength="30" required name="clienteapellido2" type="text"  placeholder="Apellido 2" value="'.$data['clienteapellido2'].'">
                    <label id="label-modal">Correo</label>
                    <input  maxLength="50"  name="clienteemail" type="text"  placeholder="Correo" value="'.$data['clientecorreo'].'">
                    <label id="label-modal">Teléfono</label>
                    <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "8"   name="clientetelefono" type="number"  placeholder="Teléfono" id="tele" value="'.$data['clientetelefono'].'">
                    <label id="label-modal">Dirección</label>
                    <input required name="clientedireccion" type="text"  placeholder="Dirección" value="'.$data['clientedireccion'].'">
                   
                    <label id="label-modal">Casas</label>
                    <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "3"  min="1" max="999" required name="clientecasasenlazadas" type="number"  placeholder="Casas" value="'.$data['clientecasas'].'">
                    
                    <label id="label-modal">Tipo de cliente</label>
                    <br>
                    <select style="width: auto;" name="clientetipo">
                     '. $combobit3.'
                     </select>
                     <br>
                     <label id="label-modal">Estado:</label>
                     <br>
                     <select style="width: auto;" name="clienteestado">
                     '. $combobit4.'
                     </select>
                    <div class="form-actions">
                        <center> <button style="background: #333; font-size: 23px; font-weight: bolder;" name="actualizar" type="submit"  > Actualizar </button></center>
                    </div>
                </form>
                </div>
            </div>
        </div>
    ';
?>