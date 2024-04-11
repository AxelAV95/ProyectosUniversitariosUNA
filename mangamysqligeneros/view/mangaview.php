
<?php
    include '../business/mangabusiness.php';
    include '../business/generobusiness.php';

    $generoBusiness = new GeneroBusiness();
    $generos = $generoBusiness->getAllTBGeneros(); //Obtengo todos los generos

    echo ' <p style="color:red"> <label style="color:black">Host</label>: '. gethostname()."</p>". "<i>Este host se usa para para configurar la conexión,
    sustituir en el data.php</i><br><br>";
?>
<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Manga CRUD</title>
    <link rel="icon" href="../resources/icons/NOT.png">
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


</head>

<body>

     <form method="POST" enctype="multipart/form-data" action="../business/mangaaction.php">
                <tr>
                    
                    <td><input required type="text" name="nombre" id="nombre" placeholder="Nombre" /></td>
                    
                    <td><input required type="number" name="numerotomo" id="numerotomo" placeholder="Número de tomo"/></td>
                    <td><input required type="number" name="anio" id="anio" placeholder="Año de publicación"/></td>
                    <td>
                        <select id="generos" name="generos" >
                            <option value="">Seleccionar género</option>
                                <?php 
                                    if(count($generos) > 0){ 
                                        foreach($generos as $current){
                                            echo '<option value="'.$current->getIdGenero().'">'.$current->getNombre().'</option>'; 
                                        }
                                    }
                                ?>
                        </select>
                    </td>
                    <td><button type="button" name="agregarGeneros" id="agregarGeneros" >Agregar géneros</button></td>
                    <!-- SECCION DONDE SE AGREGAN LOS CAMPOS DINÁMICOS -->
                    <td><table class="table table-bordered" id="dynamic_field"> 
                    <!--  --> 
                    </table> </td> 
                    <br>
                    <td><input type="submit" value="Insertar" name="create" id="create"/></td>
                </tr>
            </form>
    <section id="form">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Número de tomo</th>
                <th>Anio</th>
                <th>Acciones</th>
                <th></th>
            </tr>
           
            <?php
            $mangaBusiness = new MangaBusiness();
            $mangas = $mangaBusiness->getAllTBManga();
            foreach ($mangas as $current) {
                echo '<form method="post" id="form-manga" onclicenctype="multipart/form-data" action="../business/mangaaction.php">';
                echo '<input type="hidden" name="mangaid" value="' . $current->getIdManga() . '">';
                echo '<tr>';
                echo '<td><input type="text" name="nombre" value="' . $current->getNombre() . '"/></td>';
                echo '<td><input type="number" name="numerotomo" value="' . $current->getTomo() . '"/></td>';
                echo '<td><input type="number" name="anio" value="' . $current->getAnio() . '"/></td>';
                
                echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';
               echo' <td><a href="mangagenerosview.php?mangaid='.$current->getIdManga().'">Ver géneros</a></td>';
                echo '</tr>';
                echo '</form>';
            }
            ?>

            <tr>
                <td></td>
                <td>
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyField") {
                            echo '<p style="color: red">Campo(s) vacio(s)</p>';
                            echo ' <img src="https://c.tenor.com/Vs9QNG3lQZUAAAAC/luffy-one-piece.gif" width="170" height="100">';
                        } else if ($_GET['error'] == "dbError") {
                            echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
                            echo ' <img src="https://c.tenor.com/Vs9QNG3lQZUAAAAC/luffy-one-piece.gif" width="170" height="100">';
                        }
                    } else if (isset($_GET['success'])) {
                        echo '<p style="color: green">Transacción realizada</p>';
                        echo '<br>';
                        echo '<img src="https://c.tenor.com/EYm6p5Jm-1gAAAAd/luffy-smiling-one-piece.gif" width="170" height="100">';
                       
                    }
                    ?>
                </td>
            </tr>
        </table>
    </section>

    <footer>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script type="text/javascript">
   

    $(document).on('click', '#delete', function(){
            var resultado = confirm('¿Está seguro que desea eliminar esta categoría? (Todas las subcategorias enlazadas serán eliminadas)');
            if(!resultado){
                return false;
            }
        });
      
    </script>


    <script type="text/javascript">
        /*LÓGICA PARA CAMPOS DINÁMICOS*/
        $(document).ready(function(){  

          var i=0;
           /*CUANDO SE PRESIONA EL BOTON AGREGA CAMPOS DINÁMICOS*/  
          $('#agregarGeneros').click(function(){

            if($('#generos option:selected').prop('disabled') == true || $('#generos option:selected').text() == "Seleccionar género"){
                alert("Error al agregar, verifique que no esté repetida o que haya elegido correctamente la opción.");
            }else{
                var generoid = $("#generos option:selected").val();  
                var generonombre = $("#generos option:selected").text();  
                $("#generos option:selected").attr('disabled','disabled'); //DESACTIVA LA OPCION DEL SELECT SI SE ELIGE
                   i++;  
                   if(i <= 8){
                    $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="hidden"  id="generoid" name="generos[]" value="'+generoid+'" /><input type="text" data-genero="'+generoid+'" id="generoid" placeholder="'+generonombre+'" value="'+generonombre+'" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 
                
                  }else{
                    alert("Máximo 8 campos.");
                  }
                }
            
               
          });
          /*CUANDO SE PRESIONA X SE ELIMINAN LOS CAMPOS DINÁMICOS*/   
          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");
               var opcion = $('#row'+button_id+ ' td ' + ' input ').attr("data-genero");
               $("#generos option[value=" + opcion + "]").removeAttr('disabled');  //ACTIVA LA OPCION DEL SELECT SI SE ELIMINA DE LAS ELEGIDAS  
               $('#row'+button_id+'').remove();  
               i=0;
          });  
      
        });  
    </script>
</body>
</html>