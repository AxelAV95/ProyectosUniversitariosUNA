<?php 
	include_once 'data.php';
	//include '../domain/Empleado.php';

	class tipoEmpleadoData extends Database{

		public function tipoEmpleadoData(){}



        public function validarTipoEmpleadoDuplicado($nombre){
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = 'select count(*) as total from tbtipoempleado where tipoempleadonombre = ?';
            $result = $pdo->prepare($consulta);
            $result->bindParam(1,$nombre,PDO::PARAM_STR);
            $result->execute();

            if($result->fetchColumn()==0){ //si no existe el dato lo inserto
                 return false;
            }else{ //si ya existe el dato lo redirecciono para mostrar el mensaje
                 return true;
            }

            

        }

		public function insertarTipoEmpleado($tipo){
      $tipoempData = new tipoEmpleadoData();
			$pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if($tipoempData->validarTipoEmpleadoDuplicado($tipo)==true){
                header("Location: ../view/tipoempleadocrud.php?mensaje=Tipo de empleado existente.");
            }else{
                $stmt = $pdo ->prepare("SELECT MAX(tipoempleadoid) AS tipoempleadoid  FROM tbtipoempleado");
       

            $stmt -> execute();
         
          $nextId = 1;
          
          if($row = $stmt->fetch()){
            $nextId = $row[0]+1;
          }
          
      $sql = "INSERT INTO `tbtipoempleado`(`tipoempleadoid`, `tipoempleadonombre`) VALUES (?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nextId,$tipo));
            Database::desconectar();
            header("Location: ../view/tipoempleadocrud.php?mensaje=Agregado con éxito.");
            }

		


		}

		


		public function actualizarTipoEmpleado($tipo,$id){

			$pdo = Database::conectar();
        $tipoempData = new tipoEmpleadoData();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            if($tipoempData->validarTipoEmpleadoDuplicado($tipo)==true){
                header("Location: ../view/tipoempleadocrud.php?mensaje=Tipo de empleado existente.");
            }else{
                 
            $stmt1 = "UPDATE `tbtipoempleado` SET `tipoempleadonombre`=? WHERE tipoempleadoid = ?";
          
            $q = $pdo->prepare($stmt1);
            $q->execute(array($tipo, $id));
            Database::desconectar();
            header("Location: ../view/tipoempleadocrud.php?mensaje=Actualizado con éxito.");

            }

       
			
		}

		public function eliminarTipoEmpleado($id){
			
			// delete data
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `tbtipoempleado` WHERE tipoempleadoid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::desconectar();
        header("Location: ../view/tipoempleadocrud.php?mensaje=Eliminado con éxito.");

		}

		public function obtenerEmpleados($empleado){
			
		}


	}

?>


<?php 

	

?>
