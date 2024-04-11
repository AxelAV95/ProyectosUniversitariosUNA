
<?php
    include '../business/mangabusiness.php';


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
                echo '<td><input type="submit" value="test" name="test" id="test"/></td>';
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
        
    //    $(document).ready(function () {
    //         $("#test").click(function (event) {
    //             if(confirm("¿Está seguro que desea eliminar esta categoría? (Todas las subcategorias enlazadas serán eliminadas)")){
    //                 return true;
    //             }else{
    //                 event.preventDefault();    
    //             }
                
                
    //         });
    // });

    //    $(document).ready(function() {
    //       $("#form-manga").submit(function(e) {
    //         $("#delete").click(function(){
    //             if(confirm("¿Está seguro que desea eliminar esta categoría? (Todas las subcategorias enlazadas serán eliminadas)")){
    //                 return true;
    //             }else{
    //                 event.preventDefault();    
    //             }
    //         });
    //       });
    // });

    $(document).on('click', '#delete', function(){
            var resultado = confirm('¿Está seguro que desea eliminar esta categoría? (Todas las subcategorias enlazadas serán eliminadas)');
            if(!resultado){
                return false;
            }
        });
      
    </script>

</body>
</html>