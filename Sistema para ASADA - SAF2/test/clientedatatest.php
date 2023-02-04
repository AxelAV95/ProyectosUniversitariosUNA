<?php 

	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
    

    final class clientedatatest extends TestCase{


    	public function testsiguienteid(){
    		$pdo = Database::conectar();
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$sql2 = 'SELECT MAX(clienteid) AS clienteid  FROM tbcliente';
    		$cont = 1;
    		$cd = new ClienteData();

    		$this->assertGreaterThan(1, $cd->getMaxID($pdo,$sql2));
    		echo "\nNo se repite el ID";
    	}

        public function testinsertar(){
           $cd = new ClienteData();
            $this -> assertEquals(1, $cd -> insertar());
            echo "\nInserta correctamente";

        }


        public function testactualizar(){
            $cd = new ClienteData();
            $this -> assertEquals(1, $cd -> actualizar());
            echo "\nActualiza correctamente";

        }

        public function testeliminar(){
            $cd = new ClienteData();;
            $this -> assertEquals(1, $cd -> eliminar());
            echo "\nElimina correctamente";

        }




    	


    	
    }


?>