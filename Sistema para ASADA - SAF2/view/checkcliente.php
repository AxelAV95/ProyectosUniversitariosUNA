<?php
$conexion= mysqli_connect('localhost','root','','dbsaf2'); 


error_reporting(0);

if(!empty($_POST["username"])) {
  $query = "SELECT * FROM `tbprevista` WHERE `previstaclienteid` ='" . $_POST["username"] . "'";
  $result  = mysqli_query($conexion, $query);
  $rowcount = mysqli_num_rows($result);
  $user_count = $rowcount;
  if($user_count>0) {
     echo "<span class='status-available'></span>";
      echo ' <script>$("#idcli").val(""); </script>';
      echo '<script>
      $.alert({
        useBootstrap: false,
         boxWidth: "30%",
          title: "El cliente ya existe en el sistema de previstas.",
          type: "red",
          backgroundDismiss: true,
        
         content: "Este cliente ya se encuentra registrado en el sistema de previstas ",
         animation: "scaleX" 
  
  
      }); 
      
       </script>';
      echo "<script>setTimeout(function(){ 


        $('.status-available').hide();

       }, 2000);</script>";
  }else{
      
        echo "<span class='status-not-available'> </i>
      </span>";
      echo '<script>
      $.alert({
        useBootstrap: false,
         boxWidth: "30%",
          title: "Correo",
          type: "red",
          backgroundDismiss: true,
        
         content: "El cliente fue verificado correctamente.",
         animation: "scaleX" 
      }); 
      
       </script>'; 
  }
}
/* if($_POST["username"]){
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
        
         content: "Este correo ya se encuentra registrado en el sistema. ",
         animation: "scaleX" 
  
  
      }); 
     
     
      
       </script>';
  }


} */
?>  