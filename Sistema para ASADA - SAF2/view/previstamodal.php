<link rel="stylesheet" type="text/css" href="css/tooltipster/dist/css/tooltipster.bundle.min.css" />
<link rel="stylesheet" type="text/css" href="css/tooltipster/dist/css/tooltipster.main.css" />
<script type="text/javascript" src="css/tooltipster/dist/js/tooltipster.bundle.min.js"></script>
<style>

     .modaluser {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            
        }

    .modal-usuarios {
        display: flex;
        flex-direction: column;
            background-color: #fefefe;
            margin: 5% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 71%; /* Could be more or less, depending on screen size */
            margin: 7% auto; 
        }


        

</style>


<!-- The Modal -->




<div style="overflow:hidden; " id="myModal" class="modalInsertar" >
<div id="usuarios" class="modaluser">
        <div class="modal-usuarios" style=" width:80%; ">
            
                
            <table id="modal-tabla-usuarios" style="margin: 15% auto; padding-top: 20px; padding-bottom: 20px; padding-right: 20px; padding-left: 20px;">
                <thead align="left">
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Primer apellido</th>
                <th>Segundo apellido</th>
                <th>Direccion</th>
                <th>Correo</th>
                <th>telefono</th>
                <th>Medidor</th>
                <th>Tipo de cliente</th>
                <th>Estado</th>
                <th>Seleccionar</th>
                </thead>

                <tbody>
                    <?php
                
                $pdo = Database::conectar();
                $pdo -> exec("set names utf8");
                $sql = 'SELECT * FROM tbcliente WHERE clientetipo = 3';

                foreach ($pdo->query($sql) as $row) {
                
                echo '<input type="hidden" name="id" value="' . $row['clienteid'] . '">';
                        echo '<tr>';
                        echo '<td>'. $row['clientecedula'].'</td>';
                        echo '<td>'. $row['clientenombre'] . '</td>';
                        echo '<td>'. $row['clienteapellido1'] . '</td>';
                        echo '<td>'. $row['clienteapellido2'] . '</td>';
                        echo '<td>'. $row['clientedireccion'] . '</td>';
                        echo '<td>'. $row['clientecorreo'] . '</td>';
                        echo '<td>'. $row['clientetelefono'] . '</td>';
                        echo '<td>'. $row['clientetipo'] . '</td>';
                        echo '<td>'. $row['clientemedidor'] . '</td>';
                        echo '<td>'. $row['clienteestado'] . '</td>';
                        
                echo '<td><input type=checkbox  id ="usuarioidcheck" name="usuarioidcheck" value='. $row['clienteid'].'></td>';
                        
                        
                        
                            
                            
                            echo '</tr>';
                        
                }
                Database::desconectar();
                ?>
                        
                        </tbody>
                        </table>
        </div>
    </div>

<!-- Modal content -->
<div style="margin: 16% auto; width: 900px; " class="modalInsertar-content  animated slideInDown" >


    
    <div id="titulo">
        <center><h1 id="title-modal">Registrar Prevista</h1></center>
        <span class="close">&times;</span>
    </div>
  
<form method="post" id="regForm" class="form-emp" action="../business/previstaaction.php">


      <input type="hidden" name="insertar" value="insertar">
      <!-- One "tab" for each step in the form: -->
      
     
        <p>
        <div style="display:flex;">
        <p><input readonly style="width: 590px;" data-validation-error-msg="El cliente seleccionado no es válido."  id="idcli" name="idcli" type="text" placeholder="Seleccionar cliente..." oninput="this.className = ''" required></p>
        <span class="tooltip" title="Agregar cliente desde aquí"><a  style=" text-decoration:none" id="myBtn3"> <i  style="font-size: 33px; margin-top: px; margin-left:16px; " class="fa fa-plus-square " aria-hidden="true"></i></a> </span>
          </div>
          <div style="display:flex;">
              <input  id="saldact" name="saldact" type="number" placeholder="Saldo actual" oninput="this.className = ''" required>
              <span id="user-availability-status"></span> 
          </div>
      <div style="overflow:auto; display: flex; justify-content: center;">
        <div style="margin-top: 10px;">
          
          <input type="submit" style="display: inline-block;
    border: none;
    border-radius: 10px;
    padding: 0.5rem 1.5rem;
    margin: 0;
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
    -moz-appearance: none;background: #333; font-size: 23px; font-weight: bolder;" value="Insertar"/>
        </div>
      </div>

      

</form>

</div>

</div>



    <script type="text/javascript">
      var esp = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ ",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sSearch":         "Buscar:",
    "sInfoPostFix":    "",
    
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
        $(document).ready(function() {
    $('#modal-tabla-usuarios').dataTable(
        {
        "language": esp
    });

} );
    </script>

    
    <script type="text/javascript">
      // Get the modal
        var modal2 = document.getElementById('usuarios');
        var modal1 = document.getElementById('myModal');
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn3");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal 
        btn.onclick = function() {
        
            modal2.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal2.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        modal1.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }
    </script>

    <script type="text/javascript">
      $( '#modal-tabla-usuarios tr #usuarioidcheck' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado

       // alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
        $("#idcli").val($(this).val());
        var aux = $("#idcli").val($(this).val()).val();
     
        modal2.style.display = "none";
        disponibilidad(aux);
        //showUser(parseInt($(this).val()));
        //$(this).reset();
        $('#modal-tabla-usuarios tr #usuarioidcheck').prop('checked', false);
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
    }
});
    </script>


 <script>

function disponibilidad(val) {
    setTimeout(function(){ $("#loaderIcon").show(); }, 2000);

        jQuery.ajax({
        url: "checkcliente.php",
        data:'username='+val,
        type: "POST",
        success:function(data){
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
        },
        error:function (){}
        });
}
/*$('#registro').on('submit', function(){

    alert("helleo");
});*/
</script>
    
    
    
