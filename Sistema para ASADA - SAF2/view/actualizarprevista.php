<?php
    include '../data/data.php';
       $id = null;
         if ( !empty($_POST['id'])) {
            $id = $_POST['id'];
        }else{

        header("Location: previstaview.php");
    
        }
    if ( null==$id ) {
        header("Location: ../previstaview.php");
    } else {
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbprevista where previstaid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::desconectar();
    }
    echo '
    
        <div class="modalActualizar">
            <div class="modalActualizar-content animated rollIn">
                <div id="titulo">
                    <center><h1 id="title-modal">Actualizar Prevista </h1></center>
                    <span onclick="botonCancelar()"  class="close">&times;</span>
                </div>
                <div>
                <form id="regForm"  action="../business/previstaaction.php" method="post">

				<input required name="id" type="hidden"  placeholder="ID" value='.$id.'>
                <input required name="clienteid" type="hidden"  placeholder="ID" value='.$data['previstaclienteid'].'>

                <label id="label-modal" >Saldo anterior:</label>
				<input readonly maxlength=9 required name="saldant" type="number"  placeholder="saldo anterior" value="'.$data['previstasaldoanterior'].'">
                
                <label id="label-modal" >Ultimo abono hecho:</label>
				<input readonly maxLength="15" required name="abo" type="number"  placeholder="Abono actual" value="'.$data['previstaabonoactual'].'">
                
                <label id="label-modal" >Saldo Actual:</label>
				<input readonly maxLength="15" required name="saldact" id="saldact" type="number"  placeholder="saldoactual" value="'.$data['previstasaldoactual'].'">
                
                
                <label id="label-modal" >Abonar</label>
                <input required maxLength="15" required name="aboact" type="number" min="0" max= "'.$data['previstasaldoactual'].'" onkeyup= calcular(this.value) onchange= calcular(this.value) placeholder="Abono actual">
                
                <label id="label-modal" >Saldo restante:</label>
                <input readonly maxLength="15" name="saldrest" id="saldrest" type="number" placeholder="Saldo restante">
                
                <div style="display: flex; justify-content: center;">
                <button style="background: #333; font-size: 23px; font-weight: bolder;" name="actualizar" type="submit"  > Actualizar </button>
                </div>
                </form>
                
                </div>
            </div>
        </div>
    ';
    
?>







