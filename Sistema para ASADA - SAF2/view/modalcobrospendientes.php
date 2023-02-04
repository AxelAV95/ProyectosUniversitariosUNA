<?php 

$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$mesAux = date('n') ;
$mes = '';

if($mesAux==1){
    $mes = "'".$meses[11]."'";
}else{
    $mes = "'".$meses[date('n')-2]."'";
}





?>
<script type="text/javascript" src="js/print-datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/print-datatables.min.css"/>

<style type="text/css">
    
   #sus:hover{
   font-size: 30px;
   }
</style>

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
   overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    
  background-color: #fefefe;
  margin: 5% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close2 {
  color: #aaa;
  float: right;
  font-size: 38px;
  font-weight: bold;
  margin-top: -60px;
  margin-bottom: 80px;
}

.close2:hover,
.close2:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
<div id="cobro2" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="padding: 50px 50px 50px 50px;">
  <h1 style="font-size: 25px;">Pendientes de pagar en mes: <br><?php echo explode("'",$mes)[1] ?></h1>
    <span class="close2">&times;</span>
   
    <table id="modal-tabla-pendientes" style="margin: 15% auto; padding-top: 20px; padding-bottom: 20px; padding-right: 20px; padding-left: 20px;">
                            <thead align="left">
                      
                            <th>Nombre</th>
                            <th>Primer apellido</th>
                            <th>Segundo apellido</th>
                            <th>Medidor</th>
                            <th>Estado de cobro</th>
                            <th>Suspender servicio</th>
                            <th>Estado de cliente</th>
                            <th>Tipo de pago</th>
                            </thead>

                            <tbody>
                                <?php
                            
                            $pdo = Database::conectar();
                            $pdo -> exec("set names utf8");
                            $sql = 'SELECT tbcliente.*, tbcobro.*
                            FROM tbcliente
                            LEFT JOIN tbcobro
                              ON tbcliente.clientemedidor = tbcobro.cobromedidorid
                            WHERE tbcobro.cobromedidorid IS NULL AND ((tbcliente.clientetipo = 1) || (tbcliente.clientetipo=2 ))';
                            foreach ($pdo->query($sql) as $row) {
                            
                            echo '<input type="hidden" name="id" value="' . $row['clienteid'] . '">';
                                    echo '<tr>';
                                    echo '<td>'. $row['clientenombre'].'</td>';
                                    echo '<td>'. $row['clienteapellido1'].'</td>';
                                    echo '<td>'. $row['clienteapellido2'].'</td>';
                                    echo '<td>'. $row['clientemedidor'] . '</td>';
                                    if($row['cobroestado']== ""){
                                        echo '<td>Pendiente</td>';
                                    }
                                    echo '<td><a  onclick="suspender(' . $row['clientemedidor'] . ')"><i id="sus" class="fa fa-ban" aria-hidden="true"></i></a></td>';

                                    if($row['clienteestado'] == 1){
                                      echo '<td>Activo</td>';
                                    }
                                    if($row['clienteestado'] == 2){
                                      echo '<td>Suspendido</td>';
                                    }
                                     if($row['clienteestado'] == 4){
                                      echo '<td>Inhabilitado</td>';
                                    }

                                    if($row['clienteestado'] == 4){
                                      echo '<td>Reconexión</td>';
                                    }else if($row['clienteestado'] == 1){
                                      echo '<td>Consumo mes</td>';
                                    }else if($row['clienteestado'] == 2){
                                      echo '<td>Consumo mes, Reconexión</td>';
                                    }


                                    
                                    
                                  
                            
                                    
                                    
                                    
                                        
                                        
                                        echo '</tr>';
                                    
                            }
                            Database::desconectar();
                            ?>
                                    
                                    </tbody>
                                    </table>
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
    $('#modal-tabla-pendientes').dataTable(
        {
        "language": esp,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'collection',
                text: 'Imprimir o exportar',
                buttons: [
                    
                    {
                    extend: 'excel',
                    text: 'Excel'
                    },

                   
                    
                    {
                    extend: 'pdf',
                    text: 'PDF'
                    },
                   
                    {
                    extend: 'print',
                    text: 'Imprimir',
                    customize: function ( win ) {
                    win.document.title  = "";
                    $(win.document.body).find( '#modal-tabla-realizados' ).css( 'font-size', 'small' );
                    $(win.document.body).find( '#modal-tabla-realizados' ).css( 'margin-top', '50px' );
                   // win.document.getElementsByTagName('h1')[0].style.display = 'none';
                  
                    win.document.getElementsByTagName('h1')[0].style.fontSize = "30px";
                    win.document.getElementsByTagName('h1')[0].style.marginBottom = "30px";
  
                    win.document.getElementsByTagName('th')[0].style.color = 'black';
                    win.document.getElementsByTagName('th')[1].style.color = 'black';
                    win.document.getElementsByTagName('th')[2].style.color = 'black';
                    win.document.getElementsByTagName('th')[3].style.color = 'black';
                    win.document.getElementsByTagName('th')[4].style.color = 'black';
                    win.document.getElementsByTagName('th')[5].style.color = 'black';
                    win.document.getElementsByTagName('th')[6].style.color = 'black';
                    win.document.getElementsByTagName('th')[7].style.color = 'black';
                    win.document.getElementsByTagName('th')[8].style.color = 'black';
                    win.document.getElementsByTagName('td')[0].style.padding = '1px 1px 1px 1px';
                    win.document.getElementsByTagName('thead')[0].style.padding = '1px 1px 1px 1px';
                    
                     }
                    
                    
                    }
                ]
            }
        ]
       
    });

} );
    </script>

    <script type="text/javascript">
      
      function suspender(clienteid){

        alert(clienteid);
      }


    </script>
