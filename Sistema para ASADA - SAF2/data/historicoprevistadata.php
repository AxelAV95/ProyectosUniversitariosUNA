<?php 
error_reporting(0);
include_once 'data.php';
	include '../domain/prevista.php';

class PrevistaData extends Database{

    public function PrevistaData(){

    }

    public function insertarPrevista($previstaid, $clienteid,$saldoanterior,$abono,$saldoactual,$fecha){
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = 'INSERT INTO `tbhistoricoprevista`(`historicoprevistaprevistaid`, `historicoprevistaclienteid`, `historicoprevistasaldoanterior`, `historicoprevistaabono`, `historicoprevistasaldoactual`, `historicoprevistafecha`) VALUES (?,?,?,?,?)';
        echo '<br>';
            $q = $pdo->prepare($sql);
           
            
            $q->execute(array($nextId, $prevista->getIdCliente(),$prevista -> getSaldoActual(),$prevista ->getSaldoAnterior(),$prevista->getSaldoActual()));
            
            Database::desconectar();
            header("Location: ../view/previstaview.php?mensaje=1");

        }

?>