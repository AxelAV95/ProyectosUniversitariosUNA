<?php
    include '../data/data.php';
       $id = null;
         if ( !empty($_POST['id'])) {
            $id = $_POST['id'];
        }else{

        header("Location: empleadoview.php");
    
        }
    if ( null==$id ) {
        header("Location: ../empleadoview.php");
    } else {
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbempleado where empleadoid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::desconectar();
    }
    echo '
        <div class="modalActualizar">
            <div class="modalActualizar-content animated rollIn">
                <div id="titulo">
                    <center><h1 id="title-modal">Actualizar empleado</h1></center>
                    <span onclick="botonCancelar()" style="font-size: 44px;"  class="close">&times;</span>
                </div>
                <div>
                <form id="regForm"  action="../business/empleadoaction.php" method="post">

				<input required name="id" type="hidden"  placeholder="ID" value='.$id.'>
                
                <label id="label-modal" >Cédula</label>
				<input  maxlength=9 required name="cedula" type="text"  placeholder="Cédula" value="'.$data['empleadocedula'].'">
                
                <label id="label-modal" >Nombre</label>
				<input maxLength="15" required name="nomb" type="text"  placeholder="Nombre" value="'.$data['empleadonombre'].'">
                
                <label id="label-modal" >Primer apellido</label>
				<input maxLength="15" required name="ape1" type="text"  placeholder="Apellido 1" value="'.$data['empleadoapellido1'].'">
                
                <label id="label-modal" >Segundo apellido</label>
				<input maxLength="15" required name="ape2" type="text"  placeholder="Apellido 2" value="'.$data['empleadoapellido2'].'">
                
                <label id="label-modal" >Correo</label>
                <input maxLength="100" required name="corr" type="text"  placeholder="Correo" value="'.$data['empleadocorreo'].'">
                
                
                
                <label id="label-modal" >Teléfono</label>
				<input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "number" maxlength = "8" required name="tele" type="number"  placeholder="Telefono" value="'.$data['empleadotelefono'].'">
                
                <label id="label-modal">Dirección</label>
				<input required name="dire" type="text"  placeholder="Direccion" value="'.$data['empleadodireccion'].'">
                <div style="display: flex; justify-content: center;">
                <button style="background: #333; font-size: 23px; font-weight: bolder;" name="actualizar" type="submit"  > Actualizar </button>
                </div>
                </form>
                
                </div>
            </div>
        </div>
    ';
    
?>







