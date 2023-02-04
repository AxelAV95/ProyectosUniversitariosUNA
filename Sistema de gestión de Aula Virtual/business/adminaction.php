<?php 
	include 'adminbusiness.php';


	if(isset($_POST['realizarRespaldo'])){
		$adminBusiness = new AdminBusiness();
		$resultado = $adminBusiness->realizarBackup();

		echo $resultado;
	}




 ?>