<?php
//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

require_once('../../Conexion.php');
require_once('../../Cotizacion/Modelo/Cotizacion.php');
require_once('../../Cotizacion/Modelo/CrudCotizacion.php');

$CrudCotizacion = new CrudCotizacion();
$ListaCotizacion = $CrudCotizacion->ListarCotizacion();

// extend TCPF with custom functions
class MYPDF extends TCPDF {

	// Load table data from file
	public function LoadData($file) {
		// Read file lines
		$lines = file($file);
		$data = array();
		foreach($lines as $line) {
			$data[] = explode(';', chop($line));
		}
		return $data;
	}

	// Colored table
	public function ColoredTable($header,$data) {
		// Colors, line width and bold font
		$this->SetFillColor(40, 50, 56);
		$this->SetTextColor(255);
		$this->SetDrawColor(0, 0, 0);
		$this->SetLineWidth(0.3);
		$this->SetFont('', 'B');
		// Header
		$w = array(30, 40, 30, 40, 30, 20, 30,47);
		$num_headers = count($header);
		for($i = 0; $i < $num_headers; ++$i) {
			$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
		}
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(215, 215, 215);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = 0;
		foreach($data as $row) {
			$this->Cell($w[0], 6, $row->getIdCotizacion(), 'LR', 0, 'C', $fill);
			$this->Cell($w[1], 6, $row->getIdEmpresa(), 'LR', 0, 'C', $fill);
			$this->Cell($w[2], 6, $row->getIdEstado(), 'LR', 0, 'C', $fill);
			$this->Cell($w[3], 6, $row->getMetros_Cubicos(), 'LR', 0, 'C', $fill);
			$this->Cell($w[4], 6, $row->getValor_Metro(), 'LR', 0, 'C', $fill);
			$this->Cell($w[5], 6, $row->getIva(), 'LR', 0, 'C', $fill);
			$this->Cell($w[6], 6, $row->getValor_Total(), 'LR', 0, 'C', $fill);
			$this->Cell($w[7], 6, $row->getObservaciones(), 'LR', 0, 'L', $fill);
			$this->Ln();
			$fill=!$fill;
		}
		$this->Cell(array_sum($w), 0, '', 'T');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 011');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' Listado Cotizaciones', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

// column titles
$header = array('Cotización N°', 'Empresa', 'Estado', 'Metros Cubicos', 'Valor Metro', 'Iva', 'Valor Total', 'Obervaciones');

// data loading
$data = $pdf->LoadData('data/table_data_demo.txt');

// print colored table
$pdf->ColoredTable($header, $ListaCotizacion);

// ---------------------------------------------------------
ob_end_clean();
// close and output PDF document
$pdf->Output('ListadoCotizacion.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
