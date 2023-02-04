<?php 

	declare(strict_types=1);
	use PHPUnit\Framework\TestCase;
    

    final class empleadodatatest extends TestCase{

        
    	public function testsiguienteid(){
    		$pdo = Database::conectar();
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$sql2 = 'SELECT MAX(empleadoid) AS empleadoid  FROM tbempleado';
    		$cont = 1;
    		$ed = new EmpleadoData();

    		$this->assertGreaterThan(1, $ed->getMaxID($pdo,$sql2));
    		echo "\nNo se repite el ID";
    	}

        public function testinsertar(){
           $ed = new EmpleadoData();
            $this -> assertEquals(1, $ed -> insertar());
            echo "\nInserta correctamente";

        }


        public function testactualizar(){
            $ed = new EmpleadoData();
            $this -> assertEquals(1, $ed -> actualizar());
            echo "\nActualiza correctamente";

        }

        public function testeliminar(){
            $ed = new EmpleadoData();
            $this -> assertEquals(1, $ed -> eliminar());
            echo "\nElimina correctamente";

        }



    	


    	
    }


?>