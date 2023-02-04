<?php 
    error_reporting(0);
    include_once 'data.php';
    include_once '../domain/usuario.php';
    //Conectamos a la base de datos
   

    //incluir dominio usuario

    class UsuarioData extends Database{

        public function UsuarioData(){}

        //insertar
        public function insertar($usuario){

          
            $conexion= mysqli_connect('localhost','root','','dbsaf2'); 
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo ->prepare("SELECT MAX(multiloginid) AS multiloginid  FROM tbmultilogin");
            $stmt -> execute();

            $nextId = 1;
        	
        	if($row = $stmt->fetch()){
        		$nextId = $row[0]+1;
        	}
            
            //Escribimos la consulta necesaria
            $consultaUsuarios = "SELECT `empleadoid` FROM `tbempleado` WHERE `empleadocorreo` ='".$usuario->getUsuario()."'";

            //Obtenemos los resultados
            $resultadoConsultaUsuarios = mysqli_query($conexion, $consultaUsuarios) or die(mysql_error());
            $datosConsultaUsuarios = mysqli_fetch_array($resultadoConsultaUsuarios);
            $userID = $datosConsultaUsuarios['empleadoid'];

            
           

                $consulta = 'INSERT INTO `tbmultilogin`(`multiloginid`, `multiloginempleadoid`, `multiloginpassword`, `multilogintipousuario`) VALUES (?,?,?,?)';
                $q = $pdo->prepare($consulta);
                $q->execute(array($nextId,$userID,$usuario->getPassword(),$usuario->getTipo()));

               /* if ($q->rowCount() > 0)
    {
        return 'si';
    }else{
        return 'nada';
    }*/
                Database::desconectar();
                header("Location: ../view/usuarioview.php?mensaje=1");
                

           


            

        }

        //actualizar
        public function modificar($usuario,$id){

            $consulta = 'UPDATE `tbmultilogin` SET `multiloginpassword`= ?, `multilogintipousuario`=?  WHERE `multiloginid` = ?';
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // $sql = "UPDATE customers  set name = ?, email = ?, mobile =? WHERE id = ?";
            $q = $pdo->prepare($consulta);
            $q->execute(array( $usuario -> getPassword(),$usuario->getTipo(), $id));
            Database::desconectar();
            header("Location: ../view/usuarioview.php?mensaje=4");
			

        }
        
        //eliminar
        public function eliminar($id){
        
            $consulta = 'DELETE FROM `tbmultilogin` WHERE `multiloginid` = ?';

        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $q = $pdo->prepare($consulta);
        $q->execute(array($id));
        Database::desconectar();

        }   

        //consultar
        public function obtenerUsuarios($usuario){
            $consulta = 'SELECT * FROM `tbmultilogin` ';
        }


   public function getInfoEmpleado($pdo, $id) {
       
	   
        $sql = 'SELECT * FROM `tbempleado` WHERE `empleadoid` = '.$id.'';
        $result = "";
        foreach ($pdo->query($sql) as $row) {
            $result.= $row['empleadocorreo'];
         }

        return $result;
    
    }



    }




?>