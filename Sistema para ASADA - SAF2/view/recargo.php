<?php 

include '../data/data.php';

    $pdo = Database::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $clienteconsulta = 'SELECT  * FROM `tbcliente` WHERE `clientemedidor` = ?';

    $valores= explode("/", $_POST['recargo']);

    $q = $pdo->prepare('SELECT * FROM `tbimpuestofijo`');
    $q2 = $pdo->prepare($clienteconsulta);
    $q->setFetchMode(PDO::FETCH_NUM);
    $q2->setFetchMode(PDO::FETCH_NUM);
    
    $q->execute();
    $q2->execute(array($valores[0]));

    $resultado = $q->fetchAll();
    $resultadocliente = $q2->fetchAll();

    $recargo = $resultado[1][2];
    $tarifaaux =$resultado[0][2];
    $hidrante = $resultado[2][2];
    $casas = $resultadocliente[0][9];
  
   $tarifabasicatotal = intval($tarifaaux)*intval($casas);
   $total = $valores[1];
   $recargo = calcularPorcentaje($total,$recargo,2);
   echo json_encode(array($recargo,$tarifabasicatotal));


function calcularPorcentaje($cantidad,$porciento,$decimales){
    return ceil( number_format($cantidad*$porciento/100 ,$decimales));
}
?>