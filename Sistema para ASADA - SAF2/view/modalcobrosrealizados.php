<?php 

$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $sql = '';
    $mesAux = date('n') ;
    $mes = '';
    $mestitulo = '';
    $anio = '';
    if($mesAux==1){
        $mes = "'".$meses[11]."'";
        $mestitulo = $meses[11];
        $anio = date('Y')-1;
        $sql = 'SELECT * FROM tbcobro INNER JOIN tbcliente WHERE tbcobro.cobromedidorid = tbcliente.clientemedidor AND tbcobro.cobroanio ='.$anio.' AND tbcobro.cobroconcepto='.$mes;    
    }else{
         $mes = "'".$meses[date('n')-2]."'";
      $mestitulo = $meses[date('n')-2];
        $anio = date('Y');
        $sql = 'SELECT * FROM tbcobro INNER JOIN tbcliente WHERE tbcobro.cobromedidorid = tbcliente.clientemedidor AND tbcobro.cobroanio ='.$anio.' AND tbcobro.cobroconcepto='.$mes;    
    }
    //echo  $anioCorrespondiente = date('Y')-1;
?>

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
     overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    
  background-color: #fefefe;
  margin: 10% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 38px;
  font-weight: bold;
  margin-top: -60px;
  margin-bottom: 80px;
  
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
<div id="cobro" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="margin:5% auto;padding: 50px 50px 50px 50px;">
    <h1 style="font-size: 25px;">Cobro realizados mes de: <br><?php echo explode("'",$mes)[1] ?></h1>
    <span class="close">&times;</span>
   
    <table id="modal-tabla-realizados" style="margin: 15% auto; padding-top: 80px; padding-bottom: 20px; padding-right: 20px; padding-left: 20px;">
                            <thead align="left">
                            <th>Fecha</th>
                            <th>Nombre</th>
                            <th>Primero apellido</th>
                            <th>Segundo apellido</th>
                            <th>Mes</th>
                            <th>Año correspondiente</th>
                            <th>Medidor</th>
                            <th>Total</th>
                            <th>Estado</th>
                            </thead>

                            <tbody>
                                <?php
                            
                            $pdo = Database::conectar();
                            $pdo -> exec("set names utf8");
                           // $sql = 'SELECT * FROM tbcobro INNER JOIN tbcliente WHERE tbcobro.cobromedidorid = tbcliente.clientemedidor';
                            foreach ($pdo->query($sql) as $row) {
                            
                            echo '<input type="hidden" name="id" value="' . $row['cobroid'] . '">';
                                    echo '<tr>';
                                    echo '<td>'. $row['cobrofecha'].'</td>';
                                    echo '<td>'. $row['clientenombre'] . '</td>';
                                    echo '<td>'. $row['clienteapellido1'] . '</td>';
                                    echo '<td>'. $row['clienteapellido2'] . '</td>';
                                    echo '<td>'. $row['cobroconcepto'] . '</td>';
                                    echo '<td>'. $row['cobroanio'] . '</td>';
                                    echo '<td>'. $row['cobromedidorid'] . '</td>';
                                    
                                    
                                    echo '<td>'. $row['cobrototalapagar'] . '</td>';
                                    if($row['cobroestado'] == 1){
                                        echo '<td>Pendiente</td>';
                                    }else if($row['cobroestado'] ==2){
                                        echo '<td>Pagado</td>';
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
    },
    
    
}
        $(document).ready(function() {
    $('#modal-tabla-realizados').dataTable(
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
       
    }

    );

} );
    </script>
