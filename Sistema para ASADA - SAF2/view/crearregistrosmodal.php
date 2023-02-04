<script type="text/javascript" src="js/print-datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/print-datatables.min.css"/>

<style>
    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    border-radius: 20px;
  background-color: #fefefe;
  margin: 16% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close3 {
  color: #aaa;
  float: right;
  font-size: 38px;
  font-weight: bold;
  margin-top: -80px;
  margin-bottom: 80px;
}

.close3:hover,
.close3:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

#anio{
  margin-top: 5%;
  width: 50%;

}

#enviar{
  width: 20%;
  margin-top: 10px;
  display: inline-block;
    border: none;
    border-radius: 10px;
    padding: 0.5rem 1.5rem;
    
    text-decoration: none;
    background: #0069ed;
    color: #ffffff;
    font-family: 'Quicksand', sans-serif;
    font-size: 1rem;
    cursor: pointer;
    text-align: center;
    transition: background 250ms ease-in-out, 
                transform 150ms ease;
    -webkit-appearance: none;
    -moz-appearance: none;
}

 <?php  $year = date("Y");
        ?>

</style>
<div id="nuevosregistros" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="padding: 50px 50px 50px 50px;">
  <h1 style="font-size: 25px;">Crear registros para clientes <BR> Año: <?php echo $year; ?></h1>
    <span class="close3">&times;</span>
   
    <form method="post" action="../business/actionmedicion.php">

      <center>
     <input style="text-align: center; border-radius: 20px;" readonly id="anio" name="anio" value="<?php echo $year?>">
    
      </center>
       <center><input style="text-align: center;" id="enviar" type="submit" name="registros" value="Crear registros"></center>

    </form>
    
  </div>

</div>

