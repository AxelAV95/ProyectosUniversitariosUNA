<?php 

    include 'previstabusiness.php';
    

    if(isset($_POST['insertar'])){


        if ( !empty($_POST)) {

            $idcliente = $_POST['idcli'];
            $saldoactual = $_POST['saldact'];
            $previstaB = new BusinessPrevista();
            $prevista = new Prevista();

            $prevista->setIdCliente($idcliente);
            $prevista->setSaldoAnterior(0);
            $prevista->setAbonoActual(0);
            $prevista->setSaldoActual($saldoactual);
            $previstaB->insertarPrevista($prevista);

        }

    }else if (isset($_POST['eliminar'])) {

        if ( !empty($_POST)) {
            // keep track post values
            $id = $_POST['id'];
            $previstaB = new BusinessPrevista();
            $previstaB -> eliminarPrevista($id);
             
        }
    }if (isset($_POST['actualizar'])){

        if ( !empty($_POST)) {

            $id = $_POST['id'];
            $saldoactual = $_POST['saldrest'];
            $saldoanterior = $_POST['saldact'];
            $abonoactual = $_POST['aboact'];
            $clienteid = $_POST['clienteid'];
            $previstaB = new BusinessPrevista();
            $prevista = new Prevista();

            $prevista->setIdCliente($clienteid);
            $prevista->setSaldoAnterior($saldoanterior);
            $prevista->setAbonoActual($abonoactual);
            $prevista->setSaldoActual($saldoactual);
            $previstaB->modificarPrevista($id, $prevista);
            
        }

    }
?>
