<?php 

	include 'tipoempleadobusiness.php';


	if (isset($_POST['actualizar'])){

        
     
    
     
    if ( !empty($_POST)) {
       
        $idTipo= $_POST['idtipoemp'];
        $nombre= $_POST['nombre'];
        $tipoEmpBuss = new tipoEmpleadoBusiness();
        $tipoEmpBuss -> actualizar($nombre,$idTipo);

         
     

            
            
        
    } 
   
} else if (isset($_POST['eliminar'])) {

    if ( !empty($_POST)) {
        // keep track post values
        $idemp = $_POST['idtipoemp'];
         
        $tipoEmpBuss = new tipoEmpleadoBusiness();
        $tipoEmpBuss -> eliminar($idemp);
         
    }

   
} else if (isset($_POST['insertar'])) {

   if ( !empty($_POST)) {
       
      
        $nombre= $_POST['nombre'];
        $tipoEmpBuss = new tipoEmpleadoBusiness();
        $tipoEmpBuss -> insertar($nombre);
   

          
        
    }
}else if (isset($_POST['leer'])) {


    

   
}

?>