 
 <style type="text/css">
 
        /* The Modal (background) */
        .modal {
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

        /* Modal Content/Box */
        .modal-cliente {
        display: flex;
        flex-direction: column;
            background-color: #fefefe;
            margin: 5% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 71%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 38px;
            font-weight: bold;
            margin-top: 20px;
            margin-left: 98%;
            margin-bottom: 20px;

        }
        .campo-modal-cliente{
        width: 50%;
        }
        #myBtn, #myBtn2{
        background-color: blue;
        width: 50px;
        height: 20px;
        padding: 10px 10px 10px 10px;
        border-radius: 5px;
        cursor: pointer;
        color:white;

        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;


        }


        .modal-content{
            margin: 12% auto; /* 15% from the top and centered */
        }
 </style>
 

 

<div id="id"  class="modalInsertar" >
                  <!-- The Modal -->
    <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-cliente" style="overflow: auto; width:70%; ">
                   <!--- <span class="close">&times;</span>---->
                
                        <table id="modal-tabla-cliente" style="margin: 15% auto; padding-top: 20px; padding-bottom: 20px; padding-right: 20px; padding-left: 20px;">
                            <thead align="left">
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Primer apellido</th>
                            <th>Segundo apellido</th>
                            <th>Medidor</th>
                            <th>Seleccionar</th>
                            </thead>

                            <tbody>
                                <?php
                            
                            $pdo = Database::conectar();
                             $pdo -> exec("set names utf8");
                            $sql = 'SELECT * FROM tbcliente';
                            foreach ($pdo->query($sql) as $row) {
                            
                            echo '<input type="hidden" name="id" value="' . $row['clienteid'] . '">';
                                    echo '<tr>';
                                    echo '<td>'. $row['clientecedula'].'</td>';
                                    echo '<td>'. $row['clientenombre'] . '</td>';
                                    echo '<td>'. $row['clienteapellido1'] . '</td>';
                                    echo '<td>'. $row['clienteapellido2'] . '</td>';
                                    
                                    
                                    echo '<td>'. $row['clientemedidor'] . '</td>';
                                    
                            echo '<td><input type=checkbox  id ="medidoridcheck" name="medidoridcheck" value='. $row['clientemedidor'].'></td>';
                                    
                                    
                                    
                                        
                                        
                                        echo '</tr>';
                                    
                            }
                            Database::desconectar();
                            ?>
                                    
                                    </tbody>
                                    </table>

            </div>

</div>
        
      <span onclick="document.getElementById('id').style.display='none';document.body.style.overflow = 'hidden';" class="close" title="Close Modal"></span>
        <div class="modalInsertar-content  animated slideInDown" style="margin-top:284px;">

        <form id="regForm" class="modal-content" method="post" action="../business/actionmedicion.php" >
            <div class="container" style="margin: 80px 80px 60px 80px;">
                <br>
                <div style="margin: 15% auto; display: block; margin: 0px 0px 30px 0px;">
                    
                <center>  <a id="myBtn">Seleccionar cliente</a>
                
                <a id="myBtn2">Mas información</a></center>
                </div>
                

        
                <center><h2>Ingresar medidor</h2></center>
                <hr>
                    
                                

                            <div style="display: flex; flex-direction: row;">

                                
                            <input onchange="showUser(this.value)" type="text" name="medidorid" class="typeahead tt-query" id="med" autocomplete="off" spellcheck="false" placeholder="Ingrese medidor del cliente" style="margin-right: 20px;" required>
                            
                                <br>
                                <br>
                                </div>
                                <div id="txtHint"><b></b></div>


                <div class="clearfix">
                <center><button style="margin-top: 23px; background: #333; font-size: 23px; font-weight: bolder;"  id="insertar" type="submit" class="signupbtn" value="Insertar" name="insertar" id="insertar">Insertar</button>
                    <button style="background: #333; font-size: 23px; font-weight: bolder;" id="cancelar" type="button" onclick="botonCancelar()" class="cancelbtn">Cancelar</button>
                    </center>
                </div>
            </div>
         </form>
        
        
        
         </div>
      
    </div>

<script>
// Get the modal
var modal = document.getElementById('id');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        document.body.style.overflow = 'auto';
    }
}
</script>

<script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'buscarClente.php?key=%QUERY',
        limit : 10
    });


});


    </script>

   


    <script type="text/javascript">
      
      function cal() {
            try {
            var a = parseInt(document.f.lecturaactual.value),
                b = parseInt(document.f.lecturaanterior.value);
            document.f.metroscubicos.value = a - b;
            } catch (e) {
            }
     }
    </script>

<script>
function showUser(str) {
  if (str=='') {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","info/clienteinfo.php?q="+str,true);
  xmlhttp.send();
}
</script>
 <script type="text/javascript">
        
   //var vidFile = document.getElementById("clienteid").files[0].name; 
   // $('#insertar').attr("disabled", true);

      /*if(document.getElementById("txtHint").files.length == 0){
        $('#insertar').attr("disabled", true);
        }else{
        $('#insertar').attr("disabled", false);
    }*/

    /*$('#clienteid').keyup(function(){
        if($(this).val().length !=0){
            $('#insertar').attr('disabled', false);
        }
        else
        {
            $('#insertar').attr('disabled', true);        
        }*/

    </script>

    <script type="text/javascript">
      

      $(document).ready(function(){
  $(".busqueda").change(function(){
    alert("desactivado med");
    $("#clienteid").val('')
    $("#med").val('');
    $("#clienteid").prop('disabled', $(this).val() == '1');
    $("#med").focus();
  });
});


      
    </script>

    <script type="text/javascript">
      

      $(document).ready(function(){
  $(".busqueda").change(function(){
    alert("desactivado nya");
    $("#med").val('');
    $("#clienteid").val('');
    $("#med").prop('disabled', $(this).val() == '2');
    $("#clienteid").focus();
  });
});


      
    </script>

    <script type="text/javascript">
      // Get the modal
var modal = document.getElementById('myModal');
var mod = document.getElementById('id');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
    mod.style.overflow = 'hidden';
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
    mod.style.overflow = 'auto';
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        mod.style.overflow = 'auto';
    }
}
    </script>

    <script type="text/javascript">
      $( '#modal-tabla-cliente tr #medidoridcheck' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado

       // alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
        $medidor = $("#med").val($(this).val());
        modal.style.display = "none";
        showUser(parseInt($(this).val()));
        //$(this).reset();
        $('#modal-tabla-cliente tr #medidoridcheck').prop('checked', false);
        mod.style.overflow = 'auto';
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
    }
});
    </script>


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
    $('#modal-tabla-cliente').dataTable(
        {
        "language": esp,
        
    });

} );
    </script>

    <script type="text/javascript">
      
      $("#myBtn2").click(function(){

        $.alert({
              useBootstrap: false,
               boxWidth: '30%',
                title: 'Mensaje',
               content: 'Puede escribir el número de medidor o bien seleccionarlo a través de la tabla de clientes.',
               animation: 'Rotate' 


            });

      });
    </script>

    <script src="js/jquery-confirm.min.js"></script>
<link rel="stylesheet" href="css/jquery-confirm.min.css">


    


