<?php 

	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
    

    final class mediciondatatest extends TestCase{


    	public function testsiguienteid(){
    		$pdo = Database::conectar();
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$sql2 = 'SELECT MAX(medicionid) AS medicionid  FROM tbmediciongeneral';
    		$cont = 1;
    		$md = new MedicionData();

    		$this->assertGreaterThan(1, $md->getMaxID($pdo,$sql2));
    		echo "\nNo se repite el ID";
    	}

        public function testinsertar(){
            $md = new MedicionData();
            $this -> assertEquals(1, $md -> insertar());
            echo "\nInserta correctamente";

        }

        public function testactualizar(){
            $md = new MedicionData();
            $this -> assertEquals(1, $md -> actualizar());
            echo "\nActualiza correctamente";

        }

        public function testeliminar(){
            $md = new MedicionData();
            $this -> assertEquals(1, $md -> eliminar());
            echo "\nElimina correctamente";

        }



    	


    	
    }


?>
