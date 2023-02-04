<?php 

	include 'cobrobusiness.php';


	if (isset($_POST['actualizar'])){

    if ( !empty($_POST)) {
       


            
        
    } 

   
} 

if (isset($_POST['eliminar'])) {

    if ( !empty($_POST)) {
        // keep track post values
        $idcli = $_POST['id'];
         
        $cliBuss = new ClienteBusiness();
        $cliBuss -> eliminarCliente($idcli);
         
    }

   
} 

if (isset($_POST['insertar'])) {

   
       
        $cobrorecargo = 0;
        $cobromedidor = 0;
        $cobroclienteid = 0;
        $cobrofecha = "";
        $cobroconceptomes = "";
        $cobromedidor = 0;
        $cobrolecturaactual = 0;
        $cobrolecturaanterior = 0;
        $cobrometroscubicos = 0;
        $cobrotarifa = 0;
        $cobrometroscuadrados = 0;
        $cobrohidrante = 0;
        $cobroaniocorrespondiente = 0;
        
        $cobrototalapagar = 0;
    if(isset($_POST['cobrorecargo'])){
        $cobrorecargo = $_POST['cobrorecargo'];
        
        $cobromedidor = $_POST['cobromedidor'];
        $cobroclienteid = $_POST['cobroclienteid'];
        $cobrofecha = $_POST['cobrofecha'];
        $cobroconceptomes = $_POST['cobroconceptomes'];
        $cobroaniocorrespondiente = $_POST['cobroaniocorrespondiente'];
        $cobrolecturaactual = $_POST['cobrolecturaactual'];
        $cobrolecturaanterior =$_POST['cobrolecturaanterior'];
        $cobrometroscubicos =$_POST['cobrometroscubicos'];
        $cobrotarifa = $_POST['cobrotarifa'];
        $cobrometroscuadrados = $_POST['cobrometroscuadrados'];
        $cobrohidrante = $_POST['cobrohidrante'];
        
        $cobrototalapagar = $_POST['cobrototalapagar'];
    }else{
        $cobrorecargo = 0;
        $cobromedidor = $_POST['cobromedidor'];
        $cobroclienteid = $_POST['cobroclienteid'];
        $cobrofecha = $_POST['cobrofecha'];
        $cobroconceptomes = $_POST['cobroconceptomes'];
        $cobroaniocorrespondiente = $_POST['cobroaniocorrespondiente'];
        $cobrolecturaactual = $_POST['cobrolecturaactual'];
        $cobrolecturaanterior =$_POST['cobrolecturaanterior'];
        $cobrometroscubicos =$_POST['cobrometroscubicos'];
        $cobrotarifa = $_POST['cobrotarifa'];
        $cobrometroscuadrados = $_POST['cobrometroscuadrados'];
        $cobrohidrante = $_POST['cobrohidrante'];
        
        $cobrototalapagar = $_POST['cobrototalapagar'];
    }

    $cobro = new Cobro();
    $cobro->setClienteID($cobroclienteid);
    $cobro->setRecargo($cobrorecargo);
    $cobro->setMedidor($cobromedidor);
    $cobro->setFecha($cobrofecha);
    $cobro->setConceptoMes($cobroconceptomes);
    $cobro->setLecturaActual($cobrolecturaactual);
    $cobro->setLecturaAnterior($cobrolecturaanterior);
    $cobro->setMetrosCubicos($cobrometroscubicos);
    $cobro->setTarifa($cobrotarifa);
    $cobro->setMetrosCuadrados($cobrometroscuadrados);
    $cobro->setHidrante($cobrohidrante);
    $cobro->setTotal($cobrototalapagar);
    $cobro->setAnioCorrespondiente($cobroaniocorrespondiente);
    $cobro->setEstado(2);

    echo "<br>Recargo:".$cobro->getRecargo();
    echo "<br>CLIENTE:".$cobro->getClienteID();
    echo "<br>Medidor:".$cobro->getMedidor();
    echo "<br>Fecha:".$cobro->getFecha();
    echo "<br>Mes:".$cobro->getConceptoMes();
    echo "<br>Actual:".$cobro->getLecturaActual();
    echo "<br>Anterior:".$cobro->getLecturaAnterior();
    echo "<br>Cubicos:".$cobro->getMetrosCubicos();
    echo "<br>Tarifa:".$cobro->getTarifa();
    echo "<br>M2:".$cobro->getMetrosCuadrados();
    echo "<br>Hidrante:".$cobro->getHidrante();
    echo "<br>Total a pagar:".$cobro->getTotal();
    echo "<br>Estado:".$cobro->getEstado();
    echo "<br>Año:".$cobro->getAnio();

    
               
        $cobroBusiness = new CobroBusiness();
        $cobroBusiness->insertarCobro($cobro);

    /* $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = 'INSERT INTO `tbcobro`(`cobroid`, `cobrofecha`, `cobroclienteid`, `cobroconcepto`,`cobroanio`, `cobromedidorid`, `cobrolecturaactual`, `cobrolecturaanterior`, `cobroconsumometroscubicos`, `cobrotarifabasica`, `cobrototalmetroscuadrados`, `cobroleyhidrante`, `cobrorecargo`, `cobrototalapagar`, `cobroestado`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';

            $consulta = 'INSERT INTO `tbcobro`(`cobroid`, `cobrofecha`, `cobroclienteid`, `cobroconcepto`, `cobromedidorid`, `cobrolecturaactual`, `cobrolecturaanterior`, `cobroconsumometroscubicos`, `cobrotarifabasica`, `cobrototalmetroscuadrados`, `cobroleyhidrante`, `cobrorecargo`, `cobrototalapagar`, `cobroestado`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)';

            

            $stmt = $pdo ->prepare("SELECT MAX(cobroid) AS cobroid  FROM tbcobro");
            $stmt -> execute();

            $nextId = 1;
            
            if($row = $stmt->fetch()){
                $nextId = $row[0]+1;
            }

             $q = $pdo->prepare($consulta);
                $q->execute(array($nextId,$cobro->getFecha(),$cobro->getClienteID(),$cobro->getConceptoMes(),$cobro->getAnio(),$cobro->getMedidor(),$cobro->getLecturaActual(),$cobro->getLecturaAnterior(),$cobro->getMetrosCubicos(),$cobro->getTarifa(),$cobro->getMetrosCuadrados(),$cobro->getHidrante(),$cobro->getRecargo(),$cobro->getTotal(),$cobro->getEstado() ));
    
                Database::desconectar();
                header("Location: ../view/cobrosview.php?mensaje=1");*/


        
        
    
}else if (isset($_POST['leer'])) {

   
}

    







?>