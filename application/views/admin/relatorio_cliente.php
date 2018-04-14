<?php

include("../libraries/fonts/times.php");
include("../libraries/config/lang/spa.php");
//include
$this->load->library('tcpdf');

ob_end_clean(); //rompimento da pagina

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('AdCivil');
$pdf->SetTitle('Relatório de clientes');
$pdf->SetSubject('PDF');
$pdf->SetKeywords('Reports, Relatorio,');

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent string
//$pdf->setLanguageArray($1);
//-----------------------------------------------------
//set default font subsetting mode
$pdf->setFontSubsetting(true);

$pdf->SetFont('helvetica', '', 10, '', true);

//add a page
//this method has a several options, check the source code documentation for more information.
$pdf->setPrintHeader(false);//nao imprime o cabeçalho
$pdf->setPrintFooter(false);//
$pdf->AddPage();

$i = 0;
$tipo_documento = "";
$style = "";
$html = "";
$html ='<h3 style="text-align:center"><font color="#000">Relatório de clientes</font></h3>';
$html .='<table border="1">';
$html .='<tr style="background-color:#4169e1; color:#FFF; text-align: center; ">
	<th>Id cliente</th>
	<th>Nome</th>
	<th>Cidade</th>
	<th>Telefone</th>
	<th>CPF/CNPJ</th>
	<th>Rg</th>
	</tr>';

	foreach($clientes as $cliente) {
		$i++;
		if(($i % 2) == 0) {
			$style = 'style="background-color:#DCDCDC"';
		} else {
			$style = "";
		}
	$html .='<tr ' . $style . '><td align="center">' . $cliente->idCliente . '</td>';
	$html .='<td align="center">' . ucwords($cliente->nome_cliente ) . '</td>';
	$html .='<td align="center">' . $cliente->cidade . '</td>';
	$html .='<td align="center">' . ucwords($cliente->telefoneOne ) . '</td>';
	$html .='<td align="center">' . $cliente->doc_cliente . '</td>';
	$html .='<td align="center">' . ucwords($cliente->rg ) . '</td></tr>';
}
$html .='</table>';
$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
$pdf->Output('Reporte.pdf', 'I');
?>		