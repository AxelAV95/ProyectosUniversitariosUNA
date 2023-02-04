<?php
    session_start(); 
    include '../../business/productobusiness.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="../backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="../backend/plugins/toastr/toastr.min.css">

    <style>
        #text{
            display: none;
        }
    </style>
</head>
<body>
    <?php include 'template/header.php' ?>

    
    <div class="container">
      
        <br>
        <h1 style="font-family:Amatic SC, sans-serif;font-weight: 600;">Lista de carrito</h1>
    
       
        
       
        <hr>
        <table class="table table-bordered table-striped tabla-productos animate__animated animate__jackInTheBox animate__delay-1s">
            <thead>
                <tr>
                    <th width="20%">ID</th>
                    <th width="15%" class="text-center">Nombre</th>                    
                    <th width="20%" class="text-center">Cantidad</th>
                    <th width="20%" class="text-center">Precio</th>
                    <th width="20%" class="text-center">Total</th>
                    <th width="5%">--</th>
                        
                </tr>
            </thead>
            <tbody>
                <?php 
                    $total = 0;
                    if(!empty($_SESSION['carrito'])){
                        foreach($_SESSION['carrito'] as $indice=>$producto){
                            
                            echo '<tr>
                                <td width="20%" class="text-center">'.$producto['productoid'].'</td>
                                <td width="15%" class="text-center">'.$producto['productonombre'].'</td>
                                <td width="20%" class="text-center">'.$producto['productocantidad'].'</td>
                                <td width="20%" class="text-center">'.$producto['productoprecio'].'</td>
                                <td width="20%" class="text-center">'.number_format($producto['productoprecio']*$producto['productocantidad']).'</td>
                                <td width="5%">
                                    <form action="../../business/carritoaction.php" method="POST">
                                        <input type="hidden" name="productoid" value="'.$producto['productoid'].'">
                                        <button class="btn btn-danger" name="eliminar" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            
                                </tr>';
                            $total+=$producto['productoprecio']*$producto['productocantidad'];
                        }

                        echo ' <tr>
                    <td colspan="4" style="text-align: right;" align="3"><h3>Total</h3></td>
                    <td align="3"><h3>'.number_format($total,2).'</h3></td>
                    
                     </tr>';

                     echo '<tr>
                <td colspan="6">
                     <form action="../../business/ordenaction.php" method="POST">
                        <div class="alert alert-success">
                          <div class="form-group">
                            <label for="nombre">Ingrese su nombre: </label>
                            <input type="text" name="clientenombre" class="form-control">
                            <label for="telefono">Teléfono: </label>
                            <input type="number" name="clientetelefono" class="form-control">
                            <label for="email">Correo: </label>
                            <input type="email" name="clientecorreo" class="form-control">
                    
                            <label for="metodo">Método de pago: </label>
                            <select name="clientemetodo" class="form-control">
                                <option value="1">Efectivo</option>
                                <option value="2">Sinpe</option>
                                <option value="3">Tarjeta</option>
                            </select>
                           
                            <input style="margin-top: 1rem;" type="submit" class="btn btn-success btn-block btn-lg ordenar" name="ordenar" value="Realizar orden">
                           </div>
                        </div>
                    </form>
                </td>
               
              
            </tr>';

                    }else{
                    echo ' <div class="alert alert-success" role="alert">
                                No hay productos :c
                            </div>';
                        
                    }
                    
                ?>
                
            

                
            </tbody>
            
        </table>
   
        
    </div>

    <?php include 'template/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="../backend/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../backend/plugins/toastr/toastr.min.js"></script>

<?php 
          //ALERTAS
          echo '<script>';
          echo " var Toast = Swal.mixin({
               toast: true,
               position: 'top-right',
               showConfirmButton: false,
               timer: 3000,
               timerProgressBar: true
             });";

          if(isset($_GET['mensaje'])==1){ //insertar
            echo "Toast.fire({
                 icon: 'success',

                title: '<div style=margin-top:0.5rem;>Eliminado con éxito.</div>'
             });";
          }
          echo "</script>";

?>

</body>
</html>