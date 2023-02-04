<?php
    include '../business/clienteaction.php';
    include 'tools/NumeroALetras.php';
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fechaActual = date('d/m/Y');
        $mesActual = '';
        
        $fecha = date('d-m-Y');
   // $nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
        $nuevafecha = date ( 'd-m-Y'  );
        $mesAux = date('n') ;
        $anioCorrespondiente = 0;
        switch($mesAux){
            case 1:{
                $mesActual = $meses[11];
                $mesAnterior = $meses[10];
                $anioCorrespondiente = date('Y')-1;
                break;
            }
            case 2:{
                $mesActual = $meses[0];
                $mesAnterior = $meses[11];
                $anioCorrespondiente = date('Y');
                break;
            }
            case 3:{
                $mesActual = $meses[1];
                $mesAnterior = $meses[0];
                $anioCorrespondiente = date('Y');
                break;
            }
            case 4:{
                $mesActual = $meses[2];
                $mesAnterior = $meses[1];
                $anioCorrespondiente = date('Y');
                break;
            }
            case 5:{
                $mesActual = $meses[3];
                $mesAnterior = $meses[2];
                $anioCorrespondiente = date('Y');
                break;
            }
            case 6:{
                $mesActual = $meses[4];
                $mesAnterior = $meses[3];
                $anioCorrespondiente = date('Y');
                break;
            }
            case 7:{
                $mesActual = $meses[5];
                $mesAnterior = $meses[4];
                $anioCorrespondiente = date('Y');
                break;
            }
            case 8:{
                $mesActual = $meses[6];
                $mesAnterior = $meses[5];
                $anioCorrespondiente = date('Y');
                break;
            }
            case 9:{
                $mesActual = $meses[7];
                $mesAnterior = $meses[6];
                $anioCorrespondiente = date('Y');
                break;
            }
            case 10:{
                $mesActual = $meses[8];
                $mesAnterior = $meses[7];
                $anioCorrespondiente = date('Y');
                break;
            }
            case 11:{
                $mesActual = $meses[9];
                $mesAnterior = $meses[8];
                $anioCorrespondiente = date('Y');
                break;
            }
            case 12:{
                $mesActual = $meses[10];
                $mesAnterior = $meses[9];
                $anioCorrespondiente = date('Y');
                break;
            }

        }
       

    $id = 247204;
         if ( !empty($_POST['id'])) {  //_GET
            $id = $_POST['id'];//_REQUEST
        }else{
       // header("Location: cobrosview.php");
        }
        
    if ( null==$id ) {
       //header("Location: cobrosview.php");
    } else {
        $pdo = Database::conectar();
        $pdo -> exec("set names utf8");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbcliente where clientemedidor = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::desconectar();
    }


    $tipo = getTipoCliente($data['clientetipo']);
    $medidorcliente = $data['clientemedidor'];
    $estado = $data['clienteestado'];
    
    $reconexion = getReconexion();
    
      $mediciones = getLectura($medidorcliente,$mesActual,$mesAnterior);
      /*echo '<pre>';
      print_r($mediciones);
      echo count($mediciones);
      echo '</pre>';*/
      $impuestos = getMedidas();
      if(count($mediciones)==1){
        $lecturaactual = $mediciones[0][0];
        $lecturaanterior = $mediciones[0][1];
      }else{
        $lecturaactual = $mediciones[0][0];
        $lecturaanterior = $mediciones[1][0];
      }
      /*$lecturaactual = $mediciones[0][0];
      $lecturaanterior = $mediciones[1][0];*/
      $consumometroscubicos = intval($lecturaactual)-intval($lecturaanterior);
      $tarifa = intval($impuestos[1])*intval($data['clientecasas']);

      if($data['clientetipo']==1){
        $consumometroscuadrados = calcularEmprego($consumometroscubicos);
      }else if($data['clientetipo']==2){
        $consumometroscuadrados = calcularDomipre($consumometroscubicos);
      }

      $hidrante = calcularHidrante($consumometroscubicos);

      //$cobrototal = $tarifa+$consumometroscuadrados+$hidrante;
      
     
     if($estado == 1){
        //normal y con recargo
        $cobrototal = $tarifa+$consumometroscuadrados+$hidrante;
        $auxEstado = "Activo";

        echo '
        <div class="modalActualizar"  style="overflow:hidden;">

            <div class="modalActualizar-content  animated rollIn" style="width:50%; height: 84%; margin-top: 32px;">
            <div id="titulo">
                    <center><h1 id="title-modal">Cobro correspondiente</h1></center>
                    <center><h4 style="margin-top: 20px;font-size: 24px;" id="title-modal">Recibido de: '.$data['clientenombre'].' '.$data['clienteapellido1'].' '.$data['clienteapellido2'].'</h4></center>
                    <center><h4 style="margin-top: 20px;font-size: 24px;" id="title-modal">Tipo cliente: '.$tipo.'</h4></center>
                    <center><h4 style="margin-top: 20px;font-size: 24px;" id="title-modal">Estado: '.$auxEstado.'</h4></center>
                    <span onclick="botonCancelar()"  style="margin-top: -90px;"class="close">&times;</span>
                </div>
                <div style="">
                <div style="display:flex; justify-content:right; align-items:right; margin-left:85%;"><a   style=" text-decoration: none;text-decoration:none;" href="javascript: w=window.open(\'test5.php?medidor='.$medidorcliente.'&estado='.$estado.' \'); w.print(); "><i style="font-size: 70px;" class="fa fa-print" aria-hidden="true"><p>Imprimir<br> </p><p style="margin-left: 5px;"> factura</p></p></i></a></div>
                </div>
                <form id="regForm" style="margin-top:1%;"  class="form-horizontal" action="../business/cobroaction.php" method="post">
                    <input type="hidden" name="insertar" value="insertar">
                    <input type="hidden" name="cobroaniocorrespondiente" value="'.$anioCorrespondiente.'">
                    <input type="hidden" name="cobroclienteid" value="'.$data['clienteid'].'">
                    <input type="hidden" name="cobroestado" value="'.$estado.'">
                    <div style="display:flex; flex-direction: row; justify-content: center; align-items:center;">
                        <div style=" width:350px; height:350px;">
                        <label id="label-modal" >Fecha:</label>
                        <input  required maxlength=9 required id="cobrofecha" name="cobrofecha" type="text"  placeholder="Fecha" value="'.$nuevafecha.'"/>
                        <label id="label-modal" >Por concepto de:</label>
                        <input  required maxlength=9 required id="cobroconceptomes" name="cobroconceptomes" type="text"  placeholder="Concepto mes" value="'.$mesActual.'"/>
                        <label id="label-modal" >Medidor:</label>
                        <input  required maxlength=9 required id="cobromedidor" name="cobromedidor" type="text"  placeholder="Medidor" value="'.$id.'"/>
                        </div>
                        <div style="margin-left: 20px; width:350px; height:350px;">
                        <label id="label-modal" >Lectura actual:</label>
                        <input  required maxlength=9 required name="cobrolecturaactual" type="text"  placeholder="Lectura actual" value="'.$lecturaactual.'"/>
                        <label id="label-modal" >Lectura anterior:</label>
                        <input  required maxlength=9 required name="cobrolecturaanterior" type="text"  placeholder="Lectura anterior" value="'.$lecturaanterior.'"/>
                        <label id="label-modal" >Consumo m³:</label>
                        <input  required maxlength=9 required name="cobrometroscubicos" type="text"  placeholder="Metros cubicos" value="'.$consumometroscubicos.'"/>
                        
                        
                        </div>
                       
                    </div>
                    <div style="display:flex; flex-direction: row; justify-content: center; align-items:center;"> 
                    <div style="margin-top:-70px; width:350px; height:350px;">
                    <label id="label-modal" >Tarifa básica:</label>
                    <input  required maxlength=9 required id="cobrotarifa" name="cobrotarifa" type="text"  placeholder="Tarifa" value="'.$tarifa.'"/>
                    <label id="label-modal" >Total m²:</label>
                    <input  required maxlength=9 required name="cobrometroscuadrados" type="text"  placeholder="Total metros cuadrados" value="'.$consumometroscuadrados.'"/>
                    <label id="label-modal" >Ley hidrante:</label>
                    <input  required maxlength=9 required name="cobrohidrante" type="text"  placeholder="Ley hidrante" value="'.$hidrante.'"/>
                    </div>
                    <div style="margin-left: 20px;margin-top:-70px; width:350px; height:350px;">
                    <div style="margin-bottom: 20px; display:flex; flex-direction:column;">
                    <label id="label-modal" >Recargo:</label>
                    <input  required maxlength=9  disabled required id="cobrorecargo" name="cobrorecargo" type="text"  placeholder="Recargo" value=""/>
                    <div style="margin-left: 125px;">
                    <label  class="switch">
                    <input  id="recargo" type="checkbox" onclick="getRecargo();">
                    <span  class="slider round"></span>
                    </div>
                    </div>
                    <label  id="label-modal"  >TOTAL A PAGAR:</label>
                    <input style="margin-top:27px;" id="cobrototalapagar" required maxlength=9 required name="cobrototalapagar" type="text"  placeholder="Total metros cuadrados" value="'.$cobrototal.'"/>
                    
                    </div>
                    </div>
                   
                   

                    <div class="form-actions">
                        <center> <button style="margin-top: -15%;background: #333; font-size: 23px; font-weight: bolder;" type="submit"  > Realizar cobro </button></center>

                    </div>
                </form>

            </div>
        </div>
    ';
     }else if($estado == 2 && ($lecturaactual >0 && $lecturaanterior > 0)){
        $cobrototal = $tarifa+$consumometroscuadrados+$hidrante;
        $auxEstado= "Suspendido";
        //con recargo y reconexión
        echo '
        <div class="modalActualizar"  style="overflow:hidden;">

            <div class="modalActualizar-content  animated rollIn" style="width:50%; height: 84%; margin-top: 12px;">
            <div id="titulo">
                    <center><h1 id="title-modal">Cobro correspondiente</h1></center>
                    <center><h4 style="margin-top: 20px;font-size: 24px;" id="title-modal">Recibido de: '.$data['clientenombre'].' '.$data['clienteapellido1'].' '.$data['clienteapellido2'].'</h4></center>
                    <center><h4 style="margin-top: 20px;font-size: 24px;" id="title-modal">Tipo cliente: '.$tipo.'</h4></center>
                     <center><h4 style="margin-top: 20px;font-size: 24px;" id="title-modal">Estado: '.$auxEstado.'</h4></center>
                    <span onclick="botonCancelar()"  style="margin-top: -90px;"class="close">&times;</span>
                </div>
                <div style="">
                <div style="display:flex; justify-content:right; align-items:right; margin-left:85%;"><a   style=" text-decoration: none;text-decoration:none;" href="javascript: w=window.open(\'test5.php?medidor='.$medidorcliente.'&estado='.$estado.' \'); w.print(); "><i style="font-size: 70px;" class="fa fa-print" aria-hidden="true"><p>Imprimir<br> </p><p style="margin-left: 5px;"> factura</p></p></i></a></div>
                </div>
                <form id="regForm" style="margin-top:1%;"  class="form-horizontal" action="../business/cobroaction.php" method="post">
                    <input type="hidden" name="insertar" value="insertar">
                    <input type="hidden" name="cobroaniocorrespondiente" value="'.$anioCorrespondiente.'">
                    <input type="hidden" name="cobroclienteid" value="'.$data['clienteid'].'">
                    <input type="hidden" name="cobroestado" value="'.$estado.'">
                    <div style="display:flex; flex-direction: row; justify-content: center; align-items:center;">
                        <div style=" width:350px; height:350px;">
                        <label id="label-modal" >Fecha:</label>
                        <input  required maxlength=9 required id="cobrofecha" name="cobrofecha" type="text"  placeholder="Fecha" value="'.$nuevafecha.'"/>
                        <label id="label-modal" >Por concepto de:</label>
                        <input  required maxlength=9 required id="cobroconceptomes" name="cobroconceptomes" type="text"  placeholder="Concepto mes" value="'.$mesActual.'"/>
                        <label id="label-modal" >Medidor:</label>
                        <input  required maxlength=9 required id="cobromedidor" name="cobromedidor" type="text"  placeholder="Medidor" value="'.$id.'"/>
                        </div>
                        <div style="margin-left: 20px; width:350px; height:350px;">
                        <label id="label-modal" >Lectura actual:</label>
                        <input  required maxlength=9 required name="cobrolecturaactual" type="text"  placeholder="Lectura actual" value="'.$lecturaactual.'"/>
                        <label id="label-modal" >Lectura anterior:</label>
                        <input  required maxlength=9 required name="cobrolecturaanterior" type="text"  placeholder="Lectura anterior" value="'.$lecturaanterior.'"/>
                        <label id="label-modal" >Consumo m³:</label>
                        <input  required maxlength=9 required name="cobrometroscubicos" type="text"  placeholder="Metros cubicos" value="'.$consumometroscubicos.'"/>
                        
                        
                        </div>
                       
                    </div>
                    <div style="display:flex; flex-direction: row; justify-content: center; align-items:center;"> 
                    <div style="margin-top:-70px; width:350px; height:350px;">
                    <label id="label-modal" >Tarifa básica:</label>
                    <input  required maxlength=9 required id="cobrotarifa" name="cobrotarifa" type="text"  placeholder="Tarifa" value="'.$tarifa.'"/>
                    <label id="label-modal" >Total m²:</label>
                    <input  required maxlength=9 required name="cobrometroscuadrados" type="text"  placeholder="Total metros cuadrados" value="'.$consumometroscuadrados.'"/>
                    <label id="label-modal" >Ley hidrante:</label>
                    <input  required maxlength=9 required name="cobrohidrante" type="text"  placeholder="Ley hidrante" value="'.$hidrante.'"/>
                    </div>
                    <div style="margin-left: 20px;margin-top:-70px; width:350px; height:350px;">
                    <div style="margin-bottom: 20px; display:flex; flex-direction:column;">
                    <label id="label-modal" >Recargo:</label>
                    <input  required maxlength=9  disabled required id="cobrorecargo" name="cobrorecargo" type="text"  placeholder="Recargo" value=""/>
                    <div style="margin-left: 145px;">
                    <label  class="switch">
                    <input  id="recargo" type="checkbox" onclick="getRecargo();">
                    <span  class="slider round"></span>
                    </div>

                    <label  id="label-modal"  >Reconexión:</label>
                    <div style="display:none;" id="campo_rec">
                    
                    <input  style="margin-top:5px; " id="cobroreconexion" required maxlength=9 required name="cobroreconexion" type="text"  placeholder="Total reconexión" value="'.$reconexion.'"/>
                    </div>
                    <center>
                    <label  class="switch">
                    <input  type="checkbox" onclick="reconexion();">
                    <span  class="slider round"></span>
                    </div>
                    </center>   

                    </div>
                    

                   
                     
                    
                    </div>
                    <div style="display:flex; flex-direction: column; justify-content: center; align-items:center;"> 
                        <label style="margin-top:-107px;"  id="label-modal"  >TOTAL A PAGAR:</label>
                    <input style="margin-top:10px; width:30%;" id="cobrototalapagar" required maxlength=9 required name="cobrototalapagar" type="text"  placeholder="Total metros cuadrados" value="'.$cobrototal.'"/>
                    <div class="form-actions">
                        <center> <button style="margin-top: 0%;background: #333; font-size: 23px; font-weight: bolder;" type="submit"  > Realizar cobro </button></center>

                    </div>
                    </div>
                    </div>
                    
                   
                   

                    
                </form>

            </div>
        </div>
    ';

    
     }else if($estado==2 && $lecturaactual == 0 && $lecturaanterior >0){
        $consumometroscuadrados = 0;
        $hidrante = 0;
        $cobrototal = $tarifa+$consumometroscuadrados+$hidrante;
        $auxEstado ="Suspendido";
        //con recargo y reconexión
        echo '
        <div class="modalActualizar"  style="overflow:hidden;">

            <div class="modalActualizar-content  animated rollIn" style="width:50%; height: 84%; margin-top: 32px;">
            <div id="titulo">
                    <center><h1 id="title-modal">Cobro correspondiente</h1></center>
                    <center><h4 style="margin-top: 20px;font-size: 24px;" id="title-modal">Recibido de: '.$data['clientenombre'].' '.$data['clienteapellido1'].' '.$data['clienteapellido2'].'</h4></center>
                    <center><h4 style="margin-top: 20px;font-size: 24px;" id="title-modal">Tipo cliente: '.$tipo.'</h4></center>
                    <center><h4 style="margin-top: 20px;font-size: 24px;" id="title-modal">Estado: '.$auxEstado.'</h4></center>
                    <span onclick="botonCancelar()"  style="margin-top: -90px;"class="close">&times;</span>
                </div>
                <div style="">
                <div style="display:flex; justify-content:right; align-items:right; margin-left:85%;"><a   style=" text-decoration: none;text-decoration:none;" href="javascript: w=window.open(\'test5.php?medidor='.$medidorcliente.'&estado='.$estado.' \'); w.print(); "><i style="font-size: 70px;" class="fa fa-print" aria-hidden="true"><p>Imprimir<br> </p><p style="margin-left: 5px;"> factura</p></p></i></a></div>
                </div>
                <form id="regForm" style="margin-top:1%;"  class="form-horizontal" action="../business/cobroaction.php" method="post">
                    <input type="hidden" name="insertar" value="insertar">
                    <input type="hidden" name="cobroaniocorrespondiente" value="'.$anioCorrespondiente.'">
                    <input type="hidden" name="cobroclienteid" value="'.$data['clienteid'].'">
                    <input type="hidden" name="cobroestado" value="'.$estado.'">
                    <div style="display:flex; flex-direction: row; justify-content: center; align-items:center;">
                        <div style=" width:350px; height:350px;">
                        <label id="label-modal" >Fecha:</label>
                        <input  required maxlength=9 required id="cobrofecha" name="cobrofecha" type="text"  placeholder="Fecha" value="'.$nuevafecha.'"/>
                        <label id="label-modal" >Por concepto de:</label>
                        <input  required maxlength=9 required id="cobroconceptomes" name="cobroconceptomes" type="text"  placeholder="Concepto mes" value="'.$mesActual.'"/>
                        <label id="label-modal" >Medidor:</label>
                        <input  required maxlength=9 required id="cobromedidor" name="cobromedidor" type="text"  placeholder="Medidor" value="'.$id.'"/>
                        </div>
                        <div style="margin-left: 20px; width:350px; height:350px;">
                        <label id="label-modal" >Lectura actual:</label>
                        <input  required maxlength=9 required name="cobrolecturaactual" type="text"  placeholder="Lectura actual" value="'.$lecturaactual.'"/>
                        <label id="label-modal" >Lectura anterior:</label>
                        <input  required maxlength=9 required name="cobrolecturaanterior" type="text"  placeholder="Lectura anterior" value="'.$lecturaanterior.'"/>
                        <label id="label-modal" >Consumo m³:</label>
                        <input  required maxlength=9 required name="cobrometroscubicos" type="text"  placeholder="Metros cubicos" value="0"/>
                        
                        
                        </div>
                       
                    </div>
                    <div style="display:flex; flex-direction: row; justify-content: center; align-items:center;"> 
                    <div style="margin-top:-70px; width:350px; height:350px;">
                    <label id="label-modal" >Tarifa básica:</label>
                    <input  required maxlength=9 required id="cobrotarifa" name="cobrotarifa" type="text"  placeholder="Tarifa" value="'.$tarifa.'"/>
                    <label id="label-modal" >Total m²:</label>
                    <input  required maxlength=9 required name="cobrometroscuadrados" type="text"  placeholder="Total metros cuadrados" value="'.$consumometroscuadrados.'"/>
                    <label id="label-modal" >Ley hidrante:</label>
                    <input  required maxlength=9 required name="cobrohidrante" type="text"  placeholder="Ley hidrante" value="0"/>
                    </div>
                    <div style="margin-left: 20px;margin-top:-70px; width:350px; height:350px;">
                    <div style="margin-bottom: 20px; display:flex; flex-direction:column;">
                    <label id="label-modal" >Recargo:</label>
                    <input  required maxlength=9  disabled required id="cobrorecargo" name="cobrorecargo" type="text"  placeholder="Recargo" value=""/>
                    <div style="margin-left: 145px;">
                    <label  class="switch">
                    <input  id="recargo" type="checkbox" onclick="getRecargo();">
                    <span  class="slider round"></span>
                    </div>

                    <label  id="label-modal"  >Reconexión:</label>
                    <div style="display:none;" id="campo_rec">
                    
                    <input  style="margin-top:5px; " id="cobroreconexion" required maxlength=9 required name="cobroreconexion" type="text"  placeholder="Total reconexión" value="'.$reconexion.'"/>
                    </div>
                    <center>
                    <label  class="switch">
                    <input  type="checkbox" onclick="reconexion();">
                    <span  class="slider round"></span>
                    </div>
                    </center>   

                    </div>
                    

                   
                     
                    
                    </div>
                    <div style="display:flex; flex-direction: column; justify-content: center; align-items:center;"> 
                        <label style="margin-top:-107px;"  id="label-modal"  >TOTAL A PAGAR:</label>
                    <input style="margin-top:10px; width:30%;" id="cobrototalapagar" required maxlength=9 required name="cobrototalapagar" type="text"  placeholder="Total metros cuadrados" value="'.$cobrototal.'"/>
                    <div class="form-actions">
                        <center> <button style="margin-top: 0%;background: #333; font-size: 23px; font-weight: bolder;" type="submit"  > Realizar cobro </button></center>

                    </div>
                    </div>
                    </div>
                    
                   
                   

                    
                </form>

            </div>
        </div>
    ';

     }else if($estado==2 && $lecturaactual == 0 && $lecturaanterior == 0){
        $cobrototal = $tarifa+$consumometroscuadrados+$hidrante;
        $auxEstado ="Suspendido";
        //con recargo y reconexión
        echo '
        <div class="modalActualizar"  style="overflow:hidden;">

            <div class="modalActualizar-content  animated rollIn" style="width:50%; height: 84%; margin-top: 32px;">
            <div id="titulo">
                    <center><h1 id="title-modal">Cobro correspondiente</h1></center>
                    <center><h4 style="margin-top: 20px;font-size: 24px;" id="title-modal">Recibido de: '.$data['clientenombre'].' '.$data['clienteapellido1'].' '.$data['clienteapellido2'].'</h4></center>
                    <center><h4 style="margin-top: 20px;font-size: 24px;" id="title-modal">Tipo cliente: '.$tipo.'</h4></center>
                     <center><h4 style="margin-top: 20px;font-size: 24px;" id="title-modal">Estado: '.$auxEstado.'</h4></center>
                    <span onclick="botonCancelar()"  style="margin-top: -90px;"class="close">&times;</span>
                </div>
                <div style="">
                <div style="display:flex; justify-content:right; align-items:right; margin-left:85%;"><a   style=" text-decoration: none;text-decoration:none;" href="javascript: w=window.open(\'test5.php?medidor='.$medidorcliente.'&estado='.$estado.' \'); w.print(); "><i style="font-size: 70px;" class="fa fa-print" aria-hidden="true"><p>Imprimir<br> </p><p style="margin-left: 5px;"> factura</p></p></i></a></div>
                </div>
                <form id="regForm" style="margin-top:1%;"  class="form-horizontal" action="../business/cobroaction.php" method="post">
                    <input type="hidden" name="insertar" value="insertar">
                    <input type="hidden" name="cobroaniocorrespondiente" value="'.$anioCorrespondiente.'">
                    <input type="hidden" name="cobroclienteid" value="'.$data['clienteid'].'">
                    <input type="hidden" name="cobroestado" value="'.$estado.'">
                    <div style="display:flex; flex-direction: row; justify-content: center; align-items:center;">
                        <div style=" width:350px; height:350px;">
                        <label id="label-modal" >Fecha:</label>
                        <input  required maxlength=9 required id="cobrofecha" name="cobrofecha" type="text"  placeholder="Fecha" value="'.$nuevafecha.'"/>
                        <label id="label-modal" >Por concepto de:</label>
                        <input  required maxlength=9 required id="cobroconceptomes" name="cobroconceptomes" type="text"  placeholder="Concepto mes" value="'.$mesActual.'"/>
                        <label id="label-modal" >Medidor:</label>
                        <input  required maxlength=9 required id="cobromedidor" name="cobromedidor" type="text"  placeholder="Medidor" value="'.$id.'"/>
                        </div>
                        <div style="margin-left: 20px; width:350px; height:350px;">
                        <label id="label-modal" >Lectura actual:</label>
                        <input  required maxlength=9 required name="cobrolecturaactual" type="text"  placeholder="Lectura actual" value="'.$lecturaactual.'"/>
                        <label id="label-modal" >Lectura anterior:</label>
                        <input  required maxlength=9 required name="cobrolecturaanterior" type="text"  placeholder="Lectura anterior" value="'.$lecturaanterior.'"/>
                        <label id="label-modal" >Consumo m³:</label>
                        <input  required maxlength=9 required name="cobrometroscubicos" type="text"  placeholder="Metros cubicos" value="'.$consumometroscubicos.'"/>
                        
                        
                        </div>
                       
                    </div>
                    <div style="display:flex; flex-direction: row; justify-content: center; align-items:center;"> 
                    <div style="margin-top:-70px; width:350px; height:350px;">
                    <label id="label-modal" >Tarifa básica:</label>
                    <input  required maxlength=9 required id="cobrotarifa" name="cobrotarifa" type="text"  placeholder="Tarifa" value="'.$tarifa.'"/>
                    <label id="label-modal" >Total m²:</label>
                    <input  required maxlength=9 required name="cobrometroscuadrados" type="text"  placeholder="Total metros cuadrados" value="'.$consumometroscuadrados.'"/>
                    <label id="label-modal" >Ley hidrante:</label>
                    <input  required maxlength=9 required name="cobrohidrante" type="text"  placeholder="Ley hidrante" value="'.$hidrante.'"/>
                    </div>
                    <div style="margin-left: 20px;margin-top:-70px; width:350px; height:350px;">
                    <div style="margin-bottom: 20px; display:flex; flex-direction:column;">
                    <label id="label-modal" >Recargo:</label>
                    <input  required maxlength=9  disabled required id="cobrorecargo" name="cobrorecargo" type="text"  placeholder="Recargo" value=""/>
                    <div style="margin-left: 145px;">
                    <label  class="switch">
                    <input  id="recargo" type="checkbox" onclick="getRecargo();">
                    <span  class="slider round"></span>
                    </div>

                    <label  id="label-modal"  >Reconexión:</label>
                    <div style="display:none;" id="campo_rec">
                    
                    <input  style="margin-top:5px; " id="cobroreconexion" required maxlength=9 required name="cobroreconexion" type="text"  placeholder="Total reconexión" value="'.$reconexion.'"/>
                    </div>
                    <center>
                    <label  class="switch">
                    <input  type="checkbox" onclick="reconexion();">
                    <span  class="slider round"></span>
                    </div>
                    </center>   

                    </div>
                    

                   
                     
                    
                    </div>
                    <div style="display:flex; flex-direction: column; justify-content: center; align-items:center;"> 
                        <label style="margin-top:-107px;"  id="label-modal"  >TOTAL A PAGAR:</label>
                    <input style="margin-top:10px; width:30%;" id="cobrototalapagar" required maxlength=9 required name="cobrototalapagar" type="text"  placeholder="Total metros cuadrados" value="'.$cobrototal.'"/>
                    <div class="form-actions">
                        <center> <button style="margin-top: 0%;background: #333; font-size: 23px; font-weight: bolder;" type="submit"  > Realizar cobro </button></center>

                    </div>
                    </div>
                    </div>
                    
                   
                   

                    
                </form>

            </div>
        </div>
    ';

     }else if($estado==4 && $lecturaactual == 0 && $lecturaanterior == 0){
        $cobrototal = 0;
        $tarifa = 0;
        $auxEstado ="Inhabilitado";
        //con recargo y reconexión
        echo '
        <div class="modalActualizar"  style="overflow:hidden;">

            <div class="modalActualizar-content  animated rollIn" style="width:50%; height: 84%; margin-top: 32px;">
            <div id="titulo">
                    <center><h1 id="title-modal">Cobro correspondiente</h1></center>
                    <center><h4 style="margin-top: 20px;font-size: 24px;" id="title-modal">Recibido de: '.$data['clientenombre'].' '.$data['clienteapellido1'].' '.$data['clienteapellido2'].'</h4></center>
                    <center><h4 style="margin-top: 20px;font-size: 24px;" id="title-modal">Tipo cliente: '.$tipo.'</h4></center>
                     <center><h4 style="margin-top: 20px;font-size: 24px;" id="title-modal">Estado: '.$auxEstado.'</h4></center>
                    <span onclick="botonCancelar()"  style="margin-top: -90px;"class="close">&times;</span>
                </div>
                <div style="">
                <div style="display:flex; justify-content:right; align-items:right; margin-left:85%;"><a   style=" text-decoration: none;text-decoration:none;" href="javascript: w=window.open(\'test5.php?medidor='.$medidorcliente.'&estado='.$estado.' \'); w.print(); "><i style="font-size: 70px;" class="fa fa-print" aria-hidden="true"><p>Imprimir<br> </p><p style="margin-left: 5px;"> factura</p></p></i></a></div>
                </div>
                <form id="regForm" style="margin-top:1%;"  class="form-horizontal" action="../business/cobroaction.php" method="post">
                    <input type="hidden" name="insertar" value="insertar">
                    <input type="hidden" name="cobroaniocorrespondiente" value="'.$anioCorrespondiente.'">
                    <input type="hidden" name="cobroclienteid" value="'.$data['clienteid'].'">
                    <input type="hidden" name="cobroestado" value="'.$estado.'">
                    <div style="display:flex; flex-direction: row; justify-content: center; align-items:center;">
                        <div style=" width:350px; height:350px;">
                        <label id="label-modal" >Fecha:</label>
                        <input  required maxlength=9 required id="cobrofecha" name="cobrofecha" type="text"  placeholder="Fecha" value="'.$nuevafecha.'"/>
                        <label id="label-modal" >Por concepto de:</label>
                        <input  required maxlength=9 required id="cobroconceptomes" name="cobroconceptomes" type="text"  placeholder="Concepto mes" value="'.$mesActual.'"/>
                        <label id="label-modal" >Medidor:</label>
                        <input  required maxlength=9 required id="cobromedidor" name="cobromedidor" type="text"  placeholder="Medidor" value="'.$id.'"/>
                        </div>
                        <div style="margin-left: 20px; width:350px; height:350px;">
                        <label id="label-modal" >Lectura actual:</label>
                        <input  required maxlength=9 required name="cobrolecturaactual" type="text"  placeholder="Lectura actual" value="'.$lecturaactual.'"/>
                        <label id="label-modal" >Lectura anterior:</label>
                        <input  required maxlength=9 required name="cobrolecturaanterior" type="text"  placeholder="Lectura anterior" value="'.$lecturaanterior.'"/>
                        <label id="label-modal" >Consumo m³:</label>
                        <input  required maxlength=9 required name="cobrometroscubicos" type="text"  placeholder="Metros cubicos" value="'.$consumometroscubicos.'"/>
                        
                        
                        </div>
                       
                    </div>
                    <div style="display:flex; flex-direction: row; justify-content: center; align-items:center;"> 
                    <div style="margin-top:-70px; width:350px; height:350px;">
                    <label id="label-modal" >Tarifa básica:</label>
                    <input  required maxlength=9 required id="cobrotarifa" name="cobrotarifa" type="text"  placeholder="Tarifa" value="'.$tarifa.'"/>
                    <label id="label-modal" >Total m²:</label>
                    <input  required maxlength=9 required name="cobrometroscuadrados" type="text"  placeholder="Total metros cuadrados" value="'.$consumometroscuadrados.'"/>
                    <label id="label-modal" >Ley hidrante:</label>
                    <input  required maxlength=9 required name="cobrohidrante" type="text"  placeholder="Ley hidrante" value="'.$hidrante.'"/>
                    </div>
                    <div style="margin-left: 20px;margin-top:-70px; width:350px; height:350px;">
                    <div style="margin-bottom: 20px; display:flex; flex-direction:column;">
                    <label id="label-modal" >Recargo:</label>
                    <input  required maxlength=9  disabled required id="cobrorecargo" name="cobrorecargo" type="text"  placeholder="Recargo" value=""/>
                    <div style="margin-left: 145px;">
                    <label  class="switch">
                    <input  id="recargo" type="checkbox" onclick="getRecargo();">
                    <span  class="slider round"></span>
                    </div>

                    <label  id="label-modal"  >Reconexión:</label>
                    <div style="display:none;" id="campo_rec">
                    
                    <input  style="margin-top:5px; " id="cobroreconexion" maxlength=9 name="cobroreconexion" type="text"  placeholder="Total reconexión" value="'.$reconexion.'"/>
                    </div>
                    <center>
                    <label  class="switch">
                    <input required type="checkbox" onclick="reconexion();">
                    <span  class="slider round"></span>
                    </div>
                    </center>   

                    </div>
                    

                   
                     
                    
                    </div>
                    <div style="display:flex; flex-direction: column; justify-content: center; align-items:center;"> 
                        <label style="margin-top:-107px;"  id="label-modal"  >TOTAL A PAGAR:</label>
                    <input style="margin-top:10px; width:30%;" id="cobrototalapagar" required maxlength=9 readonly name="cobrototalapagar" type="text"  placeholder="Total a pagar" value="'.$cobrototal.'"/>
                    <div class="form-actions">
                        <center> <button style="margin-top: 0%;background: #333; font-size: 23px; font-weight: bolder;" type="submit"  > Realizar cobro </button></center>

                    </div>
                    </div>
                    </div>
                    
                   
                   

                    
                </form>

            </div>
        </div>
    ';

     }
  


    


    function getMedidas(){
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $q = $pdo->prepare('SELECT * FROM `tbimpuestofijo` ');
        $q->setFetchMode(PDO::FETCH_NUM);
        $q->execute();
        
        $resultado = $q->fetchAll();
    

        $recargo = $resultado[1][2];
        $tarifaaux =$resultado[0][2];
        $hidrante = $resultado[2][2];

        $medidas = array($recargo,$tarifaaux,$hidrante);

        return $medidas;
        
    
    }

    function getTipoCliente($tipo){

        if($tipo == 1){
            return "Emprego";
        }else if($tipo == 2){
            return "Domipre";
        }else if($tipo == 3){
            return "Prevista";
        }
    }

    function getLectura($medidor, $mesactual,$mesanterior){
        $data = array();
        $anioactual = '';
        $anioanterior = '';
        $mescondicion = date('n');
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = '';


        switch($mescondicion){
            case 1:{
                
                $anioanterior = date("Y")-1; // calcula las mediciones de los años anteriores
                $sql = 'SELECT `'.$mesactual.'` ,`'.$mesanterior.'` FROM `tbmediciongeneral` WHERE `medicionclientemedidorid` = ? AND `AnioActual` = ?';            

                $q = $pdo->prepare($sql);
                $q->setFetchMode(PDO::FETCH_NUM);
                $q->execute(array($medidor,$anioanterior));
                $data = $q->fetchAll();
                break;
            }
            case 2:{
                
                $anioanterior = date("Y")-1;
            $anioactual = date("Y");
           // $mesanterior = 'Diciembre';
            $sql = 'SELECT `'.$mesanterior.'` FROM `tbmediciongeneral` WHERE `medicionclientemedidorid` = ? AND `AnioActual` = ?';
            $sql2 = 'SELECT `'.$mesactual.'` FROM `tbmediciongeneral` WHERE `medicionclientemedidorid` = ? AND `AnioActual` = ?';
            $q = $pdo->prepare($sql);
            $q2 = $pdo->prepare($sql2);
            $q->setFetchMode(PDO::FETCH_NUM);
            $q2->setFetchMode(PDO::FETCH_NUM);

            $q->execute(array($medidor,$anioanterior));
            $q2->execute(array($medidor,$anioactual));
    
            $aux1 = $q->fetchAll();
            $aux2 = $q2->fetchAll();
            $data = array_merge($aux2,$aux1);
                
                break;
            }
            case 3:{
                $anioactual = date("Y"); // calcula las mediciones de los años anteriores
                $sql = 'SELECT `'.$mesactual.'` ,`'.$mesanterior.'` FROM `tbmediciongeneral` WHERE `medicionclientemedidorid` = ? AND `AnioActual` = ?';            

                $q = $pdo->prepare($sql);
                $q->setFetchMode(PDO::FETCH_NUM);
                $q->execute(array($medidor,$anioactual));
                $data = $q->fetchAll();
                break;
            }
            case 4:{
                $anioactual = date("Y"); // calcula las mediciones de los años anteriores
                $sql = 'SELECT `'.$mesactual.'` ,`'.$mesanterior.'` FROM `tbmediciongeneral` WHERE `medicionclientemedidorid` = ? AND `AnioActual` = ?';            

                $q = $pdo->prepare($sql);
                $q->setFetchMode(PDO::FETCH_NUM);
                $q->execute(array($medidor,$anioactual));
                $data = $q->fetchAll();
                break;
            }
            case 5:{
                $anioactual = date("Y"); // calcula las mediciones de los años anteriores
                $sql = 'SELECT `'.$mesactual.'` ,`'.$mesanterior.'` FROM `tbmediciongeneral` WHERE `medicionclientemedidorid` = ? AND `AnioActual` = ?';            

                $q = $pdo->prepare($sql);
                $q->setFetchMode(PDO::FETCH_NUM);
                $q->execute(array($medidor,$anioactual));
                $data = $q->fetchAll();
                break;
            }
            case 6:{
                $anioactual = date("Y"); // calcula las mediciones de los años anteriores
                $sql = 'SELECT `'.$mesactual.'` ,`'.$mesanterior.'` FROM `tbmediciongeneral` WHERE `medicionclientemedidorid` = ? AND `AnioActual` = ?';            

                $q = $pdo->prepare($sql);
                $q->setFetchMode(PDO::FETCH_NUM);
                $q->execute(array($medidor,$anioactual));
                $data = $q->fetchAll();
                break;
            }
            case 7:{
                $anioactual = date("Y"); // calcula las mediciones de los años anteriores
                $sql = 'SELECT `'.$mesactual.'` ,`'.$mesanterior.'` FROM `tbmediciongeneral` WHERE `medicionclientemedidorid` = ? AND `AnioActual` = ?';            

                $q = $pdo->prepare($sql);
                $q->setFetchMode(PDO::FETCH_NUM);
                $q->execute(array($medidor,$anioactual));
                $data = $q->fetchAll();
                break;
            }
            case 8:{
                $anioactual = date("Y"); // calcula las mediciones de los años anteriores
                $sql = 'SELECT `'.$mesactual.'` ,`'.$mesanterior.'` FROM `tbmediciongeneral` WHERE `medicionclientemedidorid` = ? AND `AnioActual` = ?';            

                $q = $pdo->prepare($sql);
                $q->setFetchMode(PDO::FETCH_NUM);
                $q->execute(array($medidor,$anioactual));
                $data = $q->fetchAll();
                break;
            }
            case 9:{
                $anioactual = date("Y"); // calcula las mediciones de los años anteriores
                $sql = 'SELECT `'.$mesactual.'` ,`'.$mesanterior.'` FROM `tbmediciongeneral` WHERE `medicionclientemedidorid` = ? AND `AnioActual` = ?';            

                $q = $pdo->prepare($sql);
                $q->setFetchMode(PDO::FETCH_NUM);
                $q->execute(array($medidor,$anioactual));
                $data = $q->fetchAll();
                break;
            }
            case 10:{
                $anioactual = date("Y"); // calcula las mediciones de los años anteriores
                $sql = 'SELECT `'.$mesactual.'` ,`'.$mesanterior.'` FROM `tbmediciongeneral` WHERE `medicionclientemedidorid` = ? AND `AnioActual` = ?';            

                $q = $pdo->prepare($sql);
                $q->setFetchMode(PDO::FETCH_NUM);
                $q->execute(array($medidor,$anioactual));
                $data = $q->fetchAll();
                break;
            }
            case 11:{
                $anioactual = date("Y"); // calcula las mediciones de los años anteriores
                $sql = 'SELECT `'.$mesactual.'` ,`'.$mesanterior.'` FROM `tbmediciongeneral` WHERE `medicionclientemedidorid` = ? AND `AnioActual` = ?';            

                $q = $pdo->prepare($sql);
                $q->setFetchMode(PDO::FETCH_NUM);
                $q->execute(array($medidor,$anioactual));
                $data = $q->fetchAll();
                break;
            }
            case 12:{
                $anioactual = date("Y"); // calcula las mediciones de los años anteriores
                $sql = 'SELECT `'.$mesactual.'` ,`'.$mesanterior.'` FROM `tbmediciongeneral` WHERE `medicionclientemedidorid` = ? AND `AnioActual` = ?';            

                $q = $pdo->prepare($sql);
                $q->setFetchMode(PDO::FETCH_NUM);
                $q->execute(array($medidor,$anioactual));
                $data = $q->fetchAll();
                break;
            }

        }

        return $data;

       

    }

    function calcularHidrante($metros){
        return $metros*15;
    }
    
    
    function calcularDomipre($metros){
    
        $consulta = 'SELECT * FROM `tbmedidaestandar` ';
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $domipre = array();
       
        foreach($pdo->query($consulta) as $row){
          
            array_push($domipre,$row['medidaestandardomipre']);
          
        }
    
          
        $rango1 = 0;
        $rango2 = 0;
        $rango3 = 0;
        $rango4 = 0;
    
        
        
        
        $aux = 0;
        $aux1 = 0;
        $aux2 = 0;
        $aux3 = 0;
     
        
        for($i = 1; $i <= $metros;$i++){
           
            if($i <= 10){
                $aux++;
                $rango1= $aux*$domipre[0];
                
            }
            if( $i > 10 && $i <=30) { 
                $aux1++;
                $rango2= $aux1*$domipre[1];
               
                
            }
            if($i > 30 && $i <= 60){
                $aux2++;
                $rango3=$aux2*$domipre[2];
             
            }
            if($i > 60 && $i <= 700){
                
                $aux3++;
                $rango4 = $aux3*$domipre[3];;
               
            }
        }
            $resultado = $rango1+$rango2+$rango3+$rango4;

            return $resultado;
    
    }
    
    function calcularEmprego($metros){
    
        $consulta = 'SELECT * FROM `tbmedidaestandar` ';
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        $emprego = array();
        
        
        foreach($pdo->query($consulta) as $row){

            array_push($emprego,$row['medidaestandaremprego']);
        }
    
         
        $rango1 = 0;
        $rango2 = 0;
        $rango3 = 0;
        $rango4 = 0;
        
        
        $aux = 0;
        $aux1 = 0;
        $aux2 = 0;
        $aux3 = 0;
        
        for($i = 1; $i <= $metros;$i++){
            
            if($i <= 10){
                $aux++;
                $rango1= $aux*$emprego[0];
              
            }
            if( $i > 10 && $i <=30) { 
                $aux1++;
                $rango2= $aux1*$emprego[1];
               
            }
            if($i > 30 && $i <= 60){
                $aux2++;
                $rango3=$aux2*$emprego[2];
             
            }
            if($i > 60 && $i <= 700){
                
                $aux3++;
                $rango4 = $aux3*$emprego[3];
                
               
            }
        }
            $resultado = $rango1+$rango2+$rango3+$rango4;
         
            
            return $resultado;
    
    }

    function getReconexion(){

        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $q = $pdo->prepare('SELECT `impuestovalor` FROM `tbimpuestofijo` WHERE `impuestofijoid` = 4 ');
        
        $q->execute();

        

        $reconexion =  $q->fetchColumn();

        return $reconexion;

    }

    
?>