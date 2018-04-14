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
$html ='<h2 style="text-align:center"><font color="#000">Relatório de advogados</font></h2>';
$html .='<table border="1">';
$html .='<tr style="background-color:#4169e1; color:#FFF; text-align: center; ">
	<th colspan="2">Informações do advogado</th>
	
	</tr>';

	foreach($advogados as $advogado) {
		$i++;
		if(($i % 2) == 0) {
			$style = 'style="background-color:#DCDCDC"';
		} else {
			$style = "";
		}
	$html .='<tr ' . $style . '><td align="left">  Id advogado:</td>'.'<td align="left">  ' . $advogado->idAdvogado . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Nome:</td>'.'<td align="left">  ' . $advogado->nome_advogado . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Número OAB:</td>'.'<td align="left">  ' . $advogado->numero_oab . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  RG:</td>'.'<td align="left">  ' . $advogado->rg . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  CPF:</td>'.'<td align="left">  ' . $advogado->cpf . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  E-mail:</td>'.'<td align="left">  ' . $advogado->email . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Telefone 1:</td>'.'<td align="left">  ' . $advogado->telefoneOne . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Telefone 2:</td>'.'<td align="left">  ' . $advogado->telefoneTwo . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Endereço:</td>'.'<td align="left">  ' . $advogado->endereco . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Número:</td>'.'<td align="left">  ' . $advogado->numero . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Bairro:</td>'.'<td align="left">  ' . $advogado->bairro . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Cep:</td>'.'<td align="left">  ' . $advogado->cep . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Cidade:</td>'.'<td align="left">  ' . $advogado->cidade . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Uf:</td>'.'<td align="left">  ' . $advogado->uf . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Estado civil:</td>'.'<td align="left">  ' . $advogado->estado_civil . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Possui filhos?:</td>'.'<td align="left">  ' . $advogado->possui_filhos . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Nacionalidade:</td>'.'<td align="left">  ' . $advogado->nacionalidade . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Data de nascimento:</td>'.'<td align="left">  ' . date("d/m/Y", strtotime ($advogado->data_nascimento)) . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Possui outra graduação?:</td>'.'<td align="left">  ' . $advogado->possui_outra_graduacao . '</td></tr>';
}
$html .='</table>';
$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
$pdf->Output('Reporte.pdf', 'I');
?>		