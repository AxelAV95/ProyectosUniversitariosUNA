<?php 
error_reporting(0);
include_once 'data.php';
	include '../domain/medicion.php';
    include '../domain/consumo.php';

class MedicionData extends Database{


    public function insertar(){

        $retorno = 0;
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //DECLARAR OBJETO
        /*$medicion = new Medicion();
       
        $medicion -> setAnio(2099);
        $medicion -> setMedidorID(999999);*/
        //DECLARAR SENTENCIA SQL
        $sql = 'INSERT INTO `tbmediciongeneral`(`medicionid`, `medicionclientemedidorid` , `AnioActual`) VALUES (?,?,?)';
        //AGREGAR
        $q = $pdo->prepare($sql);
        $q->execute(array(9999,9999, 9999));
        //SI AGREGO QUE RETORNE 1
        //DE LO CONTRARIO 0
        if( ($q->rowCount()>0)){
            $retorno = 1;
            return $retorno;
        }else{
            $retorno = 0;
            return $retorno;
        }
        

       return $retorno;
        

    }

    public function actualizar(){

        $retorno = 0;
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //DECLARAR OBJETO
       /* $medicion = new Medicion();
        
        $medicion -> setAnio(2099);
        $medicion -> setMedidorID(999999);*/
        //DECLARAR SENTENCIA SQL
        $update = 'UPDATE `tbmediciongeneral` SET `Enero`=:mes WHERE `medicionclientemedidorid` =:medidorid AND `AnioActual` =:anio AND medicionID =:medicionid';
        $metrosCubicos = 9999;
        $medidorID = 9999;
        $year = 9999;
        $medicionID = 9999;

        $q = $pdo->prepare($update);
        $q -> bindParam(':mes', $metrosCubicos, PDO::PARAM_STR);
        $q -> bindParam(':medidorid', $medidorID, PDO::PARAM_STR);
        $q -> bindParam(':anio', $year, PDO::PARAM_STR);
        $q -> bindParam(':medicionid', $medicionID, PDO::PARAM_STR);
        $q -> execute();

    
        //SI AGREGO QUE RETORNE 1
        //DE LO CONTRARIO 0
        if( ($q->rowCount()>0)){
            $retorno = 1;
            return $retorno;
        }else{
            $retorno = 0;
            return $retorno;
        }
        

       return $retorno;
        

    }
   

   public function eliminar(){

        $retorno = 0;
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //DECLARAR OBJETO
        /*$medicion = new Medicion();
        
        $medicion -> setAnio(2099);
        $medicion -> setMedicionID(9999);*/
        $med = 9999;
        //DECLARAR SENTENCIA SQL
       $delete = 'DELETE FROM `tbmediciongeneral` WHERE `medicionid` =:medid';
        $q= $pdo->prepare($delete);
        $q->bindParam(':medid', $med, PDO::PARAM_INT);   
        $q->execute();

    
        //SI AGREGO QUE RETORNE 1
        //DE LO CONTRARIO 0
        if( ($q->rowCount()>0)){
            $retorno = 1;
            return $retorno;
        }else{
            $retorno = 0;
            return $retorno;
        }
        

       return $retorno;
        

    }
   

    public function MedicionData(){}


    //FUNCIONANDO
    public function getMaxID($pdo,$sql){

        $stmt = $pdo ->prepare($sql);
        $stmt -> execute();
        $cont = 1;
        if($row = $stmt->fetch()){
                $cont = $row[0]+1;
            }
        return $cont;
    }

    //FUNCIONANDO
    public function validarAnioRegistro($anio, $idclient){

        //select if(u.Febrero is null, 0, 1) Febrero from tbmediciongeneral u limit 10
        //TRUE; select if(`Enero` is null, 0, 1) from tbmediciongeneral WHERE AnioActual = 2018
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'select if(`AnioActual` is null, 0, 1) from tbmediciongeneral WHERE AnioActual = '.$anio.' AND `medicionclientemedidorid` = '.$idclient.'';
        $q= $pdo->query($sql);
        echo $valor = $q->fetchColumn();

        if($valor == '1'){
             $resultado = true;
        }else{
            $resultado = false;
        }
        

        return $resultado;
    }

    

    //EN TESTING
    public function validarFecha($mes, $anio, $idclient,$pdo){

        //select if(u.Febrero is null, 0, 1) Febrero from tbmediciongeneral u limit 10
        //TRUE; select if(`Enero` is null, 0, 1) from tbmediciongeneral WHERE AnioActual = 2018

        $sql = 'select if(`'.$mes.'` is null, 0, 1) from tbmediciongeneral WHERE AnioActual = '.$anio.' AND `medicionclienteid` = '.$idclient.'';
        $q= $pdo->query($sql);
        echo $valor = $q->fetchColumn();

        if($valor == '1'){
             $resultado = true;
        }else{
            $resultado = false;
        }
        

        return $resultado;
        //si mes está vacio en año x return true
        //sino return false
        //Agosto, 2018
          //88 return true -> si desea cambiarlo, actualizar

        //Agosto,2018
          //NULL return false -> proceder a llenar


        //si mes está lleno en x año return true
        //sino return false


    }

    
    //ELLIMAR
    public function eliminarMedicionGeneral($medicion){
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $delete = 'DELETE FROM `tbmediciongeneral` WHERE `medicionid` =:medid';
        $stmt = $pdo->prepare($delete);
        $stmt->bindParam(':medid', $medicion -> getMedicionID(), PDO::PARAM_INT);   
        $stmt->execute();
        Database::desconectar();
        header("Location: ../view/mediciongeneralview.php");
    }
    
    
    
    //FUNCIONANDO
    public function insertarMedicionGeneral($medicion){
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $md = new MedicionData();
        $sql = 'INSERT INTO `tbmediciongeneral`(`medicionid`, `medicionclientemedidorid` , `AnioActual`) VALUES (?,?,?)';
        //$sql = 'INSERT INTO `tbmediciongeneral`(`medicionid`, `'.$medicion->getCliente().'` ,`'.$medicion->getMes().'`, `AnioActual`) VALUES (?,?,?,?)';
        $sql2 = 'SELECT MAX(medicionid) AS medicionid  FROM tbmediciongeneral';

        if($md->validarAnioRegistro($medicion->getAnio(), $medicion->getMedidorID())==false){
            $proximoID = $md->getMaxID($pdo,$sql2);
        $q = $pdo->prepare($sql);

        $q->execute(array($proximoID, $medicion->getMedidorID(), $medicion->getAnio()));
        Database::desconectar();
       
        header("Location: ../view/mediciongeneralview.php?mensaje=1");

        }else{
            $alerta = "Ya existe registro." ;
            header("Location: ../view/mediciongeneralview.php?mensaje=2");
        }
        



    }
    ///FUNCIONANDO
    public function actualizarMedicionGeneral($medicion){

        //mes columna
        //valor metros cubicos
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $update = 'UPDATE `tbmediciongeneral` SET `'.$medicion ->getMes().'`=:mes WHERE `medicionclientemedidorid` =:medidorid AND `AnioActual` =:anio AND medicionID =:medicionid';
        $metrosCubicos = $medicion -> getLecturaActual();
        $medidorID = $medicion -> getMedidorID();
        $year = $medicion -> getAnio();
        $medicionID = $medicion -> getMedicionID();

        $q = $pdo->prepare($update);
        $q -> bindParam(':mes', $metrosCubicos, PDO::PARAM_STR);
        $q -> bindParam(':medidorid', $medidorID, PDO::PARAM_STR);
        $q -> bindParam(':anio', $year, PDO::PARAM_STR);
        $q -> bindParam(':medicionid', $medicionID, PDO::PARAM_STR);
        $q -> execute();

        Database::desconectar();
        header("Location: ../view/mediciongeneralview.php");


    }
    //TESTING
	/*public function insertar($medicion){
		$pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo ->prepare("SELECT MAX(medicioncalculadaid) AS medicioncalculadaid  FROM tbmedicioncalculada");
        $stmt -> execute();
        $nextId = 1;
        	
        	if($row = $stmt->fetch()){
        		$nextId = $row[0]+1;
        	}




        $sql = 'INSERT INTO `tbmedicioncalculada`(`medicioncalculadaid`, `mcclienteid`, `mcfecha`, `mcactual`, `mcanterior`, `mcmetroscubicos`) VALUES (?,?,?,?,?,?)';
        //$sql2 = 'UPDATE `tbmediciongeneral` SET `'.$medicion -> getM.'`  WHERE medicionclienteid = ?';
        $q = $pdo->prepare($sql);
            $q->execute(array($nextId,$medicion->getCliente(),$medicion->getFecha(),$medicion -> getLecturaActual(), $medicion-> getLecturaAnterior(), $medicion -> getConsumoMetrosCubicos()));
            Database::desconectar();
            header("Location: ../view/medicionview.php");
 
	}*/

    //FUNCIONANDO
    public function seleccionarMedicionGeneral(){


        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = $pdo->query("SELECT * FROM tbmediciongeneral")->fetchAll();
        $medicion = [];
        foreach ($data as $row) {
             $object = new Consumo();
             $object -> setConsumoID($row['consumoid']);
             $object -> setCliente($row['consumoclienteid']);
             $object -> setConsumoMetrosCubicos($row['consumometroscubicos']);
             $object -> setFecha($row['consumofecha']);
            
             array_push($consumo, $object);

        }
         $pdo = Database::Desconectar();
        return $consumo;

    }
    //EN TESTING
    public function seleccionarConsumo(){

        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = $pdo->query("SELECT * FROM tbconsumo")->fetchAll();
        $consumo = [];
        foreach ($data as $row) {
             $object = new Consumo();
             $object -> setConsumoID($row['consumoid']);
             $object -> setCliente($row['consumoclienteid']);
             $object -> setConsumoMetrosCubicos($row['consumometroscubicos']);
             $object -> setFecha($row['consumofecha']);
            
             array_push($consumo, $object);

        }
         $pdo = Database::Desconectar();
        return $consumo;

    }
    //EN TESTING
   public function getLecturaActual($conn,$id){
    
            $stm = $conn ->prepare('SELECT MONTHNAME(now())');
            $año = $conn ->prepare('SELECT YEAR(now())');
            $año -> execute();
            $year = $año -> fetch(PDO::FETCH_ASSOC);
             $aux2 = $year['YEAR(now())'];
            $stm -> execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            $aux = $result['MONTHNAME(now())'];
            $mesActual =""; //Agosto
            if($aux == "January"){
                $mesActual = "Enero";
            }else if($aux == "February"){
                $mesActual = "Febrero";
            }else if($aux == "March"){
                $mesActual = "Marzo";
            }else if($aux == "April"){
                $mesActual = "Abril";
            }else if($aux == "May"){
                $mesActual = "Mayo";
            }else if($aux == "June"){
                $mesActual = "Junio";
            }else if($aux == "July"){
                $mesActual = "Julio";
            }else if($aux == "August"){
                $mesActual = "Agosto";
            }else if($aux == "September"){
                $mesActual = "Septiembre";
            }else if($aux == "October"){
                $mesActual = "Octubre";
            }else if($aux == "November"){
                $mesActual = "Noviembre";
            }else if($aux == "December"){
                $mesActual = "Diciembre";
            }

            $mesActualNumero = 'SELECT MONTH(now())'; //8
            //$mesAnterior = $mesActualNumero-1;
            $actual = 'SELECT `'.$mesActual.'`  FROM `tbmediciongeneral` WHERE medicionclienteid = '.$id.' AND AnioActual ='.$aux2.'';



            $result2 = "";

            foreach ($conn->query($actual) as $row) {
                $result2.= $row["$mesActual"];
            }
            

            
            return $result2;



    }
    //EN TESTING
    function getLecturaAnterior($conn,$id){


          $stm = $conn ->prepare('SELECT MONTH(now())');
          $año = $conn ->prepare('SELECT YEAR(now())');
          $stm -> execute();
          $año -> execute();
          $result = $stm->fetch(PDO::FETCH_ASSOC);
          $year = $año -> fetch(PDO::FETCH_ASSOC);
          $aux = $result['MONTH(now())'];
          $aux2 = $year['YEAR(now())'];
          $mesAnterior = ""; //8; 
          //$aux = ;
          if($aux == 1){
            $mesAnterior= "Diciembre";
          }else if($aux == 2){
            $mesAnterior= "Enero";
          }else if($aux == 3){
            $mesAnterior= "Febrero";
          }else if($aux == 4){
            $mesAnterior= "Marzo";
          }else if($aux == 5){
            $mesAnterior= "Abril";
          }else if($aux == 6){
            $mesAnterior= "Mayo";
          }else if($aux == 7){
            $mesAnterior= "Junio";
          }else if($aux == 8){
            $mesAnterior= "Julio";
          }else if($aux == 9){
            $mesAnterior= "Agosto";
          }else if($aux == 10){
            $mesAnterior= "Septiembre";
          }else if($aux == 11){
            $mesAnterior= "Octubre";
          }else if($aux == 12){
            $mesAnterior= "Noviembre";
          }
          $anterior = "SELECT `$mesAnterior`  FROM `tbmediciongeneral` WHERE `medicionclienteid` = ? AND `AnioActual` = ?";
        $result2 = "";
        $stmt = $conn->prepare($anterior);
        $stmt->execute(array($id,$aux2)); 
        //$result2 = $stmt->rowCount();
        $k = $stmt->fetch();
        $result2 = $k["$mesAnterior"];
         return $result2;



    }
    //FUNCIONANDO
    function getInfoCliente($conn,$id) {
        $sql = 'SELECT * FROM `tbcliente` WHERE clientemedidor = '.$id.'';
        $result = "";
        foreach ($conn->query($sql) as $row) {
            $result.= '<td>' .$row['clientenombre']." ". $row['clienteapellido1']." ".$row['clienteapellido2'].'</td>';
    }

    return $result;
    
    }

    


}



?>