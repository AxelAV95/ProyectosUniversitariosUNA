<?php
$conexion= mysqli_connect('localhost','root','','dbsaf2'); 




if(!empty($_POST["username"])) {
  $query = "SELECT * FROM `tbempleado` WHERE `empleadocorreo` ='" . $_POST["username"] . "'";
  $result  = mysqli_query($conexion, $query);
  $rowcount = mysqli_num_rows($result);
  $user_count = $rowcount;
  if($user_count>0) {
      echo "<span class='status-not-available'> </i>
      </span>";
      echo '<script>
      $.alert({
        useBootstrap: false,
         boxWidth: "30%",
          title: "Correo",
          type: "red",
          backgroundDismiss: true,
        
         content: "Su correo fue verificado correctamente.",
         animation: "scaleX" 
  
  
      }); 
      
       </script>';
  }else{
      echo "<span class='status-available'></span>";
      echo ' <script>$("#correo").val(""); </script>';
      echo '<script>
      $.alert({
        useBootstrap: false,
         boxWidth: "30%",
          title: "Correo no existe en el sistema.",
          type: "red",
          backgroundDismiss: true,
        
         content: "Su correo debe existir en la base de datos del sistema para poder registrarse.Por favor contactar con el administrador del sistema para llevar a cabo el registro de su correo.",
         animation: "scaleX" 
  
  
      }); 
      
       </script>';
      echo "<script>setTimeout(function(){ 


        $('.status-available').hide();

       }, 2000);</script>";
      
  }
}
if($_POST["username"]){
    $query = "SELECT * FROM `tbmultilogin` WHERE `multiloginempleadoid` = (SELECT `empleadoid` FROM `tbempleado` WHERE `empleadocorreo` = '" . $_POST["username"] . "')";

   // $query = "SELECT * FROM `tbempleado` WHERE `empleadocorreo` ='" . $_POST["username"] . "'";
  $result  = mysqli_query($conexion, $query);
  $rowcount = mysqli_num_rows($result);
  $user_count = $rowcount;
  if($user_count>0) {
      echo "<span class='status-not-available'>
      </span>";
      echo ' <script>$("#correo").val(""); </script>';
      echo '<script>
      $.alert({
        useBootstrap: false,
         boxWidth: "30%",
          title: "Cuenta existente.",
          type: "red",
          backgroundDismiss: true,
        
         content: "Su cuenta ya se encuentra registrada en el sistema. Ya puede iniciar sesión.",
         animation: "scaleX" 
  
  
      }); 
      setTimeout(function(){
        window.location.replace("../index.php");
       
    }, 3000);
     
      
       </script>';
  }


}
?>  