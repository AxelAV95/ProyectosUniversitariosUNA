<?php 
session_start();
include '../../business/productobusiness.php';
include '../../business/categoriabusiness.php';

$categoriaid = $_GET['categoriaid'];
$contador = 0;
$cantidadPorPagina = 12;
$productoBusiness = new ProductoBusiness();
$paginas = $productoBusiness->getTotalProductosCategoria($categoriaid);

$categoriaBusiness = new CategoriaBusiness();
$categorias = $categoriaBusiness->getAllTBCategorias();


$inicio = ($_GET['pagina']-1)*$cantidadPorPagina;

$productos = $productoBusiness->getPaginasProductoCategoria($inicio, $cantidadPorPagina,$categoriaid );




?>

<?php 
    if(!$_GET){
        header('Location: productocategoriaview.php?pagina=1');
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

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>


    
</head>
<body>
    <?php 

        include 'template/header.php';
     ?>

    
    <div class="container">
      
       <hr class="mt-3 mb-3 bg-faded"/>
        <div class="row">
            <div class="col swiper animate__animated animate__flipInX animate__delay-1s">
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
         <hr class="mt-3 mb-3 bg-faded"/>
        
      
            
        
  <br><br><br>
  		<?php  

  			if(!count($productos) <= 0){
  				echo '<h1 class="text-center animate__animated animate__bounce" style="font-family:Amatic SC, sans-serif;font-weight: 600;">Productos</h1>';
  			}

  		?>
        
       
        <div class="row d-flex justify-content-center">

            <?php 


                


            if(count($productos) <= 0){
                	echo '<div>
      			<h1 id="not-available" class="text-center" style="font-family:Amatic SC, sans-serif;font-weight: 600;"></h1>
      		</div>';
                }else{
                	foreach($productos as $producto){
              
                    echo '<div class="col3 mx-3 mt-3">
                    <div class="card animate__animated animate__fadeInDown animate__delay-1s">
                        <img class="card-img-top d-block mx-auto mt-2 producto-item-img" src="../backend/'.$producto['productoimg'].'" alt="" style="border-radius: 50%;" >
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

                }

                

                

              $paginas = ceil($paginas/$cantidadPorPagina);
            ?>

            </div>
           
                        
            <nav>


              <ul class="pagination  justify-content-center mt-4">
                <?php $propiedad = $_GET['pagina'] <= 1 ? "disabled" : "" ; ?>
                
                <?php 	if(!count($productos) <= 0){?>

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

                 <?php	}?>

                 
                
            </ul>
        </nav>
            
        </div>
    </div>
        <?php include 'template/footer.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script>
        

$(document).ready(function(){
    const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  slidesPerView: 4,
  spaceBetween: 1,
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
 
      }
      function decreaseCount(a, b) {
        var input = b.nextElementSibling;
        var value = parseInt(input.value, 10); 
        if (value > 1) {
          value = isNaN(value)? 0 : value;
          value --;
          input.value = value;
         
        }
      }
    </script>
    

    <script>

    	var app = document.getElementById('not-available');
    	var typewriter = new Typewriter(app, {
    		loop: true,
    		delay: 60
    		
    	});

    	typewriter.typeString('¡Gracias por preferirnos!')
    	.pauseFor(2500)
    	.deleteAll()
    	.typeString('No contamos con este producto por el momento :(')
    	.pauseFor(1500)
    	.deleteChars(2)
    	.pauseFor(1500)
    	.typeString('pero... :)')
    	.pauseFor(1500)
    	.deleteAll()
    	.pauseFor(1500)
    	.typeString('<strong>Para más productos disponibles: <a href="index.php">Aquí</a> </strong>')
    	.pauseFor(5000)
    	.start();
    	
    </script>

</body>
</html>