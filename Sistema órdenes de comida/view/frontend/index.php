 <?php 
session_start();
include '../../business/productobusiness.php';
include '../../business/categoriabusiness.php';

$contador = 0;
$cantidadPorPagina = 12;
$productoBusiness = new ProductoBusiness();
$paginas = $productoBusiness->getTotalProductos();

$categoriaBusiness = new CategoriaBusiness();
$categorias = $categoriaBusiness->getAllTBCategorias();



// border-radius: 50%;  background: #ffffff;
// box-shadow: inset -6px -6px 30px #c7c7c7,
//             inset 6px 6px 30px #ffffff;



?>

<?php 
    if(!$_GET){
        header('Location: index.php?pagina=1');
    } 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Francois+One&family=Lato:wght@300;700&family=Titan+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
<link rel="stylesheet" href="../backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="../backend/plugins/toastr/toastr.min.css">

    
</head>
<body>
    <?php 

        include 'template/header.php';
     ?>

    
    <div class="container">
      <!--  <h1 class="text-center animate__animated animate__bounce" style="font-family:Amatic SC, sans-serif;font-weight: 600;">Categorías</h1> -->
       <hr class="mt-3 mb-3 bg-faded"/>

       <div class="container ">
         <div class="row">
            <div class="col-12 swiper animate__animated animate__flipInX animate__delay-1s">
                <div class="swiper-wrapper" style="margin-bottom: 5rem; border-bottom: 1px solid black;">
                <?php 

                    foreach ($categorias as $categoria) {

                        echo '<div class ="text-center swiper-slide" style="height:0;width:7%;padding-bottom:7%; ">
            <div>
            <a href=productocategoriaview.php?pagina=1&categoriaid='.$categoria['categoriaid'].'><img src="../backend/'.$categoria['categoriaimg'].'" alt="" style="width: 5rem;margin-top:0.8rem;"></a>
            </div>
        </div>';
               
                    }

                ?>
                </div>

              
            </div>

        </div>  
       </div>
        
         <hr class="mt-3 mb-3 bg-faded"/>
        
        
            
        <?php
                    // if (isset($_GET['mensaje'])) {
                    //     if($_GET['mensaje']=="exito"){
                    //         echo '<div class="alert alert-success" role="alert">';
                    //         echo '<a href="carritoview.php" class="badge badge-success">Ver carrito</a>';
                    //         echo '</div>';
                    //     }else if($_GET['mensaje']=="repetido"){
                    //         echo '<div class="alert alert-success" role="alert">';
                    //         echo 'Ya ha sido agregado :c';
                    //         echo '</div>';
                    //     }
                        
                        
                    // } 
        ?>
            
        
        <br><br><br>
        <h1 class="text-center animate__animated animate__bounce" style="font-family:Amatic SC, sans-serif;font-weight: 600;">Productos</h1>
       

        <div class="row d-flex justify-content-center">

            <?php 
                
                $inicio = ($_GET['pagina']-1)*$cantidadPorPagina;
                
                $productos = $productoBusiness->getPaginasProducto($inicio, $cantidadPorPagina );

                

                foreach($productos as $producto){
              
                    echo '<div class="col3 mx-3 mt-3">
                    <div class="card animate__animated animate__fadeInDown animate__delay-1s">
                        <img class="card-img-top d-block mx-auto mt-2 producto-item-img" src="../backend/'.$producto['productoimg'].'" alt="" style="border-radius: 50%;">
                        <div class="card-body">
                            <h5 class="card-title text-center producto-item ">'.$producto['productonombre'].'</h5>
                            <p class="card-text text-center producto-item-precio">₡'.$producto['productoprecio'].'</p>
                                <div class="text-center">
        
                                    <form action="../../business/carritoaction.php" method="POST">
                                        <input type="hidden" name="productoid" value="'.$producto['productoid'].'">
                                        <input type="hidden" name="productonombre" value="'.$producto['productonombre'].'">
                                        <input type="hidden" name="productoprecio" value="'.$producto['productoprecio'].'">
                                       
                                         <div class="counter">
                                         <span class="down" onClick="decreaseCount(event, this)">-</span>
                                         <input type="text" class="productocantidad" name="productocantidad"  value="1">
                                         <span class="up"  onClick="increaseCount(event, this)">+</span>
                                         </div>
                                         <button class="btn btn-primary producto-item-boton" name ="agregar" type="submit">Agregar a carrito</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
                    $contador++;
                }

              $paginas = ceil($paginas/$cantidadPorPagina);
            ?>

            </div>
           
                        
            <nav>

              <ul class="pagination  justify-content-center mt-4">
                <?php $propiedad = $_GET['pagina'] <= 1 ? "disabled" : "" ; ?>
                <li class="page-item paginacion-item <?php echo $propiedad ?>"><a class="page-link" href="index.php?pagina=<?php echo    $_GET['pagina']-1 ?>">Anterior</a></li>
                <?php 
                    for($i = 1;$i <= $paginas;$i++){
                        if($_GET['pagina'] == $i){
                            echo '<li class="page-item paginacion-item active"><a class="page-link"  href="index.php?pagina='.$i.'">'.$i.'</a></li>';
                        }else{
                            echo '<li class="page-item paginacion-item"><a class="page-link"  href="index.php?pagina='.$i.'">'.$i.'</a></li>';
                        }
                        
                    }

                ?>
                <?php 
                 $propiedad = $_GET['pagina'] >= $paginas ? "disabled" : "" ;
                 ?>
                <li class="page-item paginacion-item <?php echo $propiedad ?>"><a class="page-link " href="index.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a></li>
            </ul>
        </nav>
            
        </div>
    </div>
        <?php include 'template/footer.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

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
          if($_GET['mensaje']==1){ //insertar
            echo "Toast.fire({
                 icon: 'success',

                title: '<div style=margin-top:0.5rem;>Se ha agregado al carrito.</div>'
             });";
          }else if($_GET['mensaje']==2){ //orden hecha
            echo "Swal.fire({
  title: '¡Su orden n° ".$_GET['ordenid']." está siendo procesada! <br> ¡Gracias por preferirnos!',
  width: 700,
  padding: '3em',
  color: '#716add',
  background: '#fff',
  backdrop: `
    white
    url('../backend/img/otros/order.gif')
    center
    no-repeat
  `
})";
          }else if($_GET['mensaje'] == 3){ //eliminar
            echo "Toast.fire({
                 icon: 'info',
                title: '<div style=margin-top:0.5rem;>Ya ha agregado este producto.</div>'
             });";
          }else if($_GET['mensaje'] == 4){ //eliminar
            echo "Toast.fire({
                 icon: 'error',
                title: '<div style=margin-top:0.5rem;>Error al procesar.</div>'
             });";
          }
          echo "</script>";

?>



    <script>
        

$(document).ready(function(){
    const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  slidesPerView: 4
  

});

    });
    </script>
                

   
    
    <script type="text/javascript">
      function increaseCount(a, b) {
        var input = b.previousElementSibling;
        var value = parseInt(input.value, 10); 
        value = isNaN(value)? 0 : value;
        value ++;
        input.value = value;
        //animateCSS('.productocantidad','rubberBand');
      }
      function decreaseCount(a, b) {
        var input = b.nextElementSibling;
        var value = parseInt(input.value, 10); 
        if (value > 1) {
          value = isNaN(value)? 0 : value;
          value --;
          input.value = value;
         // animateCSS('.productocantidad','rubberBand');
        }
      }
    </script>
    



</body>
</html>