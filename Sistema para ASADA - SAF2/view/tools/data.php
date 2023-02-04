<?php 
    include 'NumeroALetras.php';
	include '../../data/data.php';

	
	
if( isset($_POST['metros'])){
    $metros = $_POST['metros'];
}



echo '<div style="display:flex;justify-content: center;
align-items: center; flex-direction:column;">';
echo '<div style="margin: 15% auto;">';
echo '<h4>Consumo: '.$metros.'m³.</h4>';
echo '<h4>Total Domipre  m²: ₡'. calcularDomipre(round($metros * 100) / 100).'</h4>'; 

echo '<h4>Total Emprego  m²: ₡'. calcularEmprego($metros).'</h4>';
echo '<h4>Total hidrante: ₡'. calcularHidrante($metros).'</h4>';
//echo '<h4>Total en letras Domipre: '. NumeroALetras::convertir(calcularDomipre($metros,'colones','centimos')).'</h4>';
//echo '<h4>Total en letras Emprego: '. NumeroALetras::convertir(calcularEmprego($metros,'colones','centimos')).'</h4>';
echo '</div>';
echo '</div>';


function calcularHidrante($metros){
    return $metros*15;
}


function calcularDomipre($metros){

	$consulta = 'SELECT * FROM `tbmedidaestandar` ';
	$pdo = Database::conectar();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$domipre = array();
   
	foreach($pdo->query($consulta) as $row){
      //  echo $row['medidaestandardomipre'];
        array_push($domipre,$row['medidaestandardomipre']);
      
    }

		//$array[$metros];
	$rango1 = 0;
	$rango2 = 0;
	$rango3 = 0;
	$rango4 = 0;

	
	
	
	$aux = 0;
	$aux1 = 0;
	$aux2 = 0;
	$aux3 = 0;
	//$array2[x];
	
	for($i = 1; $i <= $metros;$i++){
		//$array[$i]=$i;
		//cout << array[i] <<endl;
		if($i <= 10){
			$aux++;
			$rango1= $aux*$domipre[0];
			//array2[i] = rango1;
		}
		if( $i > 10 && $i <=30) { 
			$aux1++;
			$rango2= $aux1*$domipre[1];
			//array2[i] = rango1+rango2;
			
		}
		if($i > 30 && $i <= 60){
			$aux2++;
			$rango3=$aux2*$domipre[2];
			
		//	array2[i] = rango1+rango2+rango3;
			
		}
		if($i > 60 && $i <= 700){
			
			$aux3++;
			$rango4 = $aux3*$domipre[3];;
			
			//array2[i] = rango1+rango2+rango3+rango4;
		}
	}
		$resultado = $rango1+$rango2+$rango3+$rango4;
		/*for(int i = 1; i <=x;i++){
			cout << array2[i] << endl;
		}
		cout << endl;
		cout << endl;
		cout <<"Rango 1(217) *" << aux << " - Total: "<< 217*aux<< endl;
		cout <<"Rango 2(250) *"  << aux1 << " - Total: "<< 250*aux1<<endl;
		cout <<"Rango 3(312) *" << aux2 <<" - Total: " << 312*aux2<<endl;
		cout <<"Rango 4(469) *"  << aux3 << " - Total: " <<469*aux3<<endl;*/
		/*SELECT DESDE LA BASE DE DATOS CON ESTAS CANTIDADES Y EXTRAER DEL ARRAY*/
		
		return $resultado;

}

function calcularEmprego($metros){

	$consulta = 'SELECT * FROM `tbmedidaestandar` ';
	$pdo = Database::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $emprego = array();
	
	
	foreach($pdo->query($consulta) as $row){
      //  echo $row['medidaestandardomipre'];
        
        array_push($emprego,$row['medidaestandaremprego']);
    }

		//$array[$metros];
	$rango1 = 0;
	$rango2 = 0;
	$rango3 = 0;
	$rango4 = 0;
	
	
	$aux = 0;
	$aux1 = 0;
	$aux2 = 0;
	$aux3 = 0;
	//$array2[x];
	
	for($i = 1; $i <= $metros;$i++){
		//$array[$i]=$i;
		//cout << array[i] <<endl;
		if($i <= 10){
			$aux++;
			$rango1= $aux*$emprego[0];
			//array2[i] = rango1;
		}
		if( $i > 10 && $i <=30) { 
			$aux1++;
			$rango2= $aux1*$emprego[1];
			//array2[i] = rango1+rango2;
			
		}
		if($i > 30 && $i <= 60){
			$aux2++;
			$rango3=$aux2*$emprego[2];
			
		//	array2[i] = rango1+rango2+rango3;
			
		}
		if($i > 60 && $i <= 700){
			
			$aux3++;
			$rango4 = $aux3*$emprego[3];
			
			//array2[i] = rango1+rango2+rango3+rango4;
		}
	}
		$resultado = $rango1+$rango2+$rango3+$rango4;
		/*for(int i = 1; i <=x;i++){
			cout << array2[i] << endl;
		}
		cout << endl;
		cout << endl;
		cout <<"Rango 1(217) *" << aux << " - Total: "<< 217*aux<< endl;
		cout <<"Rango 2(250) *"  << aux1 << " - Total: "<< 250*aux1<<endl;
		cout <<"Rango 3(312) *" << aux2 <<" - Total: " << 312*aux2<<endl;
		cout <<"Rango 4(469) *"  << aux3 << " - Total: " <<469*aux3<<endl;*/
		/*SELECT DESDE LA BASE DE DATOS CON ESTAS CANTIDADES Y EXTRAER DEL ARRAY*/
		
		return $resultado;

}

function number_to_word( $num = '' )
{
    $num    = ( string ) ( ( int ) $num );
   
    if( ( int ) ( $num ) && ctype_digit( $num ) )
    {
        $words  = array( );
       
        $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
       
        $list1  = array('','one','two','three','four','five','six','seven',
            'eight','nine','ten','eleven','twelve','thirteen','fourteen',
            'fifteen','sixteen','seventeen','eighteen','nineteen');
       
        $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
            'seventy','eighty','ninety','hundred');
       
        $list3  = array('','thousand','million','billion','trillion',
            'quadrillion','quintillion','sextillion','septillion',
            'octillion','nonillion','decillion','undecillion',
            'duodecillion','tredecillion','quattuordecillion',
            'quindecillion','sexdecillion','septendecillion',
            'octodecillion','novemdecillion','vigintillion');
       
        $num_length = strlen( $num );
        $levels = ( int ) ( ( $num_length + 2 ) / 3 );
        $max_length = $levels * 3;
        $num    = substr( '00'.$num , -$max_length );
        $num_levels = str_split( $num , 3 );
       
        foreach( $num_levels as $num_part )
        {
            $levels--;
            $hundreds   = ( int ) ( $num_part / 100 );
            $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
            $tens       = ( int ) ( $num_part % 100 );
            $singles    = '';
           
            if( $tens < 20 )
            {
                $tens   = ( $tens ? ' ' . $list1[$tens] . ' ' : '' );
            }
            else
            {
                $tens   = ( int ) ( $tens / 10 );
                $tens   = ' ' . $list2[$tens] . ' ';
                $singles    = ( int ) ( $num_part % 10 );
                $singles    = ' ' . $list1[$singles] . ' ';
            }
            $words[]    = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' );
        }
       
        $commas = count( $words );
       
        if( $commas > 1 )
        {
            $commas = $commas - 1;
        }
       
        $words  = implode( ', ' , $words );
       
        //Some Finishing Touch
        //Replacing multiples of spaces with one space
        $words  = trim( str_replace( ' ,' , ',' , trim_all( ucwords( $words ) ) ) , ', ' );
        if( $commas )
        {
            $words  = str_replace_last( ',' , ' and' , $words );
        }
       
        return $words;
    }
    else if( ! ( ( int ) $num ) )
    {
        return 'Zero';
    }
    return '';
}

 


?>