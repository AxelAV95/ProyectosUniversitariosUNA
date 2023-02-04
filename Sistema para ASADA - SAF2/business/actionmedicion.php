<?php 

	include 'businessmedicion.php';


	if (isset($_POST['actualizar'])){


        
     
    
     
    if ( !empty($_POST)) {

        $connect = mysqli_connect("localhost", "root", "", "dbsaf2");
if(isset($_POST["id"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
  $query = "UPDATE tbmediciongeneral SET ".$_POST["column_name"]."='".$value."' WHERE medicionid = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo '<p style="margin-bottom: 30px;" align="center">Datos actualizados.</p>';
 }
}

       /* $medicionid = $_POST['medicionid'];
        $medidorid = $_POST['medidorid'];
        $metroscubicos= $_POST['metroscubicos'];
        $anio = $_POST['anio'];
        $mes = $_POST['mes'];

        $Rmedicion = new Medicion();
        $Rmedicion -> setMedicionID($medicionid);
        $Rmedicion -> setMedidorID($medidorid);
        $Rmedicion -> setLecturaActual($metroscubicos);
        $Rmedicion -> setMes($mes);
        $Rmedicion -> setAnio($anio);

        $medBuss = new BusinessMedicion();
        $medBuss ->  actualizarMedicionGeneral($Rmedicion);*/

    }
       
   
} else if (isset($_POST['eliminar'])) {

    if ( !empty($_POST)) {
            
            $connect = mysqli_connect("localhost", "root", "", "dbsaf2");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM tbmediciongeneral WHERE medicionid = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo '<p style="margin-bottom: 30px;" align="center">Registro eliminado</p>';
 }
}


        /*$medicionid = $_POST['medicionid'];
        $Rmedicion = new Medicion();
        $Rmedicion -> setMedicionID($medicionid);
        echo $Rmedicion -> getMedicionID();
        $medBuss = new BusinessMedicion();
        $medBuss ->  eliminarMedicionGeneral($Rmedicion);*/
      
         
    }

   
} else if (isset($_POST['insertar'])) {

   if ( !empty($_POST)) {

        $clienteID = $_POST['clienteid'];
        //$mes = $_POST['mes'];
        $anio = $_POST['anio'];
        $medidor = $_POST['medidorid'];
        //$metrosCubicos = $_POST['metroscubicos'];

        $Rmedicion = new Medicion();
        $Rmedicion -> setCliente($clienteID);
        $Rmedicion -> setAnio($anio);
        $Rmedicion -> setMedidorID($medidor);

        $medBuss = new BusinessMedicion();
        $medBuss ->  insertarMedicionGeneral($Rmedicion);
       


       }
}else if (isset($_POST['leer'])) {


    

    

   
}else if(isset($_POST['registros'])){

    $pdo = Database::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    
    echo $consulta_clientes = 'SELECT `clientemedidor` FROM `tbcliente` WHERE (`clientetipo` = 1 || `clientetipo` = 2) '; //<--2
    $insertar_registros = 'INSERT INTO `tbmediciongeneral`(`medicionid`, `medicionclientemedidorid`, `AnioActual`) VALUES (?, ?, ?)'; //<--3


    if(isset($_POST['anio'])){
        //obtengo año
       $year = $_POST['anio'];
           echo $consulta_verificar_registros = 'SELECT * FROM `tbmediciongeneral` WHERE `AnioActual` = '.$year; //<--1
           

       $evento1 = $pdo->prepare($consulta_verificar_registros);
       $evento1->execute();
       //$contador = $evento1->rowCount();
       
       if($evento1->rowCount() == 0){
             //seleccionar todos los clientes
            //obtener resultados y almacenarlos en un array
            $evento2 = $pdo->prepare($consulta_clientes);
            $evento2->execute();
            $datos = $evento2->fetchAll();
           /*echo '<pre>';
            print_r($datos);
            echo '</pre>';*/
            
            $consulta_id = $pdo ->prepare("SELECT MAX(medicionid) AS medicionid  FROM tbmediciongeneral");
            $id_siguiente = 1;
            foreach ($datos as $key => $item) {
                   // echo $item[0]."<br>";

                     $consulta_id -> execute();

                //obtengo
                
                
                if($row = $consulta_id->fetch()){
                    $id_siguiente= $row[0]+1;
                }

                //echo $id_siguiente;
                    
               // echo $id_siguiente.' '.$name.' '.$year.'<br>';
                //inserto a la base de datos
                $q = $pdo->prepare($insertar_registros);
              
                $q->execute(array($id_siguiente,$item[0],$year));

            }

            header("Location: ../view/mediciongeneralview.php?mensaje=3");

       }else{

        header("Location: ../view/mediciongeneralview.php?mensaje=4");
            
   
    }


    }else{
        header("Location: ../view/mediciongeneralview.php?mensaje=4");

    }
   
   
    
    
  
    //insertar en la base de datos cada cliente
    //verificar si existen registros de x año
   



}


?>