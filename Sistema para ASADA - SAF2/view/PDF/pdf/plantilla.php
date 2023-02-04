<?php
	
	require 'fpdf/fpdf.php';
	
	class PDFNoActualizados extends FPDF
	{
		function Header()
		{
			//$this->Image('logo.png', 5, 5, 20 );
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(99,10, 'REPORTE MEDICIONES - CLIENTES NO ACTUALIZADOS',0,0,'C');
			$this->Ln(4);
			$this->SetFont('Arial','B',8);
			$this->Cell(159,10, 'ASADA FINCA DOS',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}


	class PDFActualizados extends FPDF
	{
		function Header()
		{
			//$this->Image('logo.png', 5, 5, 20 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(100,10, 'REPORTE MEDICIONES - CLIENTES ACTUALIZADOS',0,0,'C');
			$this->Ln(4);
			$this->SetFont('Arial','B',8);
			$this->Cell(159,10, 'ASADA FINCA DOS',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}

	class PDFNoRegistrados extends FPDF
	{
		function Header()
		{
			//$this->Image('logo.png', 5, 5, 20 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'REPORTE CLIENTES - NO REGISTRADOS ',0,0,'C');
			$this->Ln(4);
			$this->SetFont('Arial','B',8);
			$this->Cell(179,10, 'ASADA FINCA DOS',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>