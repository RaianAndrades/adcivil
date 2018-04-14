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
$html ='<h2 style="text-align:center"><font color="#000">Relatório de audiências</font></h2>';
$html .='<table border="1" >';
$html .='<tr style="background-color:#4169E1; color:#FFF; text-align: center; ">
	<th colspan="2">Informações do processo</th>
	</tr>';

	foreach($processos as $processo) {
		$i++;
		if(($i % 2) == 0) {
			$style = 'style="background-color:#DCDCDC"';
		} else {
			$style = "";
		}
	$html .='<tr ' . $style . '><td align="left">  Id Processo:</td>'.'<td align="left">  ' . $processo->idProcesso . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Número:</td>'.'<td align="left">  ' . $processo->numero_processo . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Data de abertura:</td>'.'<td align="left">  ' . date("d/m/Y", strtotime ($processo->data_abertura)) . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Situação do cliente:</td>'.'<td align="left">  ' . $processo->situacao_cliente . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Relato dos fatos:</td>'.'<td align="left">  ' . $processo->relato_fatos . '</td></tr>';
}

$html .='</table>';

//inicio audiencias
$html .='<h2 style="text-align:center"><font color="#000">Audiências</font></h2>';
$html .='<br><br><br><table border="1" >';
$html .='<tr style="background-color:#4169E1; color:#FFF; text-align: center; ">

	<th>Data</th>
	<th>Horário</th>
	<th>Vara</th>
	<th>Cidade</th>
	</tr>';

	foreach($processos_audiencias as $pa) {
		$i++;
		if(($i % 2) == 0) {
			$style = 'style="background-color:#DCDCDC"';
		} else {
			$style = "";
		}
	$html .='<tr ' . $style . '><td align="center">' . date("d/m/Y", strtotime ($pa->data)) . '</td>';
	$html .='<td align="center">' . $pa->horario . '</td>';
	$html .='<td align="center">' . $pa->vara . '</td>';
	$html .='<td align="center">' . $pa->cidade . '</td></tr>';
}

$html .='</table>';
//final audiencias


$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
$pdf->Output('Reporte.pdf', 'I');
?>		

<!-- $html .='<tr style="background-color:#FF3; color:#000; text-align: center; ">
	<th colspan="2">Testemunhas do processo</th>
	</tr>';
$html .='<tr>';	

	foreach($processos_testemunhas as $testemunha) {
		$i++;
		if(($i % 2) == 0) {
			$style = 'style="background-color:#9BA9CF"';
		} else {
			$style = "";
		}
	
	$html .='<td ' . $style . '><td align="left">  Nome:</td>'.'<td align="left">  ' . $testemunha->nome_testemunha . '</td>';
	$html .='<td ' . $style . '><td align="left">  Telefone:</td>'.'<td align="left">  ' . $testemunha->telefoneOne . '</td>';
	$html .='<td ' . $style . '><td align="left">  Cidade:</td>'.'<td align="left">  ' . $testemunha->cidade . '</td>'; -->