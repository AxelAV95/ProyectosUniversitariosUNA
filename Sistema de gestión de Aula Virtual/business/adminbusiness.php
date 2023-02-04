<?php 

include '../data/admindata.php';

class AdminBusiness{
	private $adminData;

	public function __construct(){
		$this->adminData = new AdminData();
	}

    public function realizarBackup(){
    	 return $this->adminData->realizarBackup();
    }

    public function verTotalEstudiantes(){
		return $this->adminData->verTotalEstudiantes();
	}

	public function verTotalProfesores(){
		return $this->adminData->verTotalProfesores();
	}

	public function verTotalCursos(){
		return $this->adminData->verTotalCursos();
	}


}




?>