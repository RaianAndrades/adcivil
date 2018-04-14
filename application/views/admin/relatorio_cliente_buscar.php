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
$html ='<h2 style="text-align:center"><font color="#000">Relatório de clientes</font></h2>';
$html .='<table border="1" >';
$html .='<tr style="background-color:#4169e1; color:#FFF; text-align: center; ">
	<th colspan="2">Informações do cliente</th>
	</tr>';

	// <th>Id cliente</th>
	// <th>Nome</th>
	// <th>Cidade</th>
	// <th>Telefone</th>
	// <th>Cpf</th>
	// <th>Rg</th>

	foreach($clientes as $cliente) {
		$i++;
		if(($i % 2) == 0) {
			$style = 'style="background-color:#DCDCDC"';
		} else {
			$style = "";
		}
	$html .='<tr ' . $style . '><td align="left">  Id Cliente:</td>'.'<td align="left">  ' . $cliente->idCliente . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Nome:</td>'.'<td align="left">  ' . $cliente->nome_cliente . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  CPF/CNPJ:</td>'.'<td align="left">  ' . $cliente->doc_cliente . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Rg:</td>'.'<td align="left">  ' . $cliente->rg . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Data de nascimento:</td>'.'<td align="left">  ' . date("d/m/Y", strtotime ($cliente->data_nascimento)) . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  E-mail:</td>'.'<td align="left">  ' . $cliente->email . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Telefone 1:</td>'.'<td align="left">  ' . $cliente->telefoneOne . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Telefone 2:</td>'.'<td align="left">  ' . $cliente->telefoneTwo . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Endereço:</td>'.'<td align="left">  ' . $cliente->endereco . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Número:</td>'.'<td align="left">  ' . $cliente->numero . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Bairro:</td>'.'<td align="left">  ' . $cliente->bairro . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Cep:</td>'.'<td align="left">  ' . $cliente->cep . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Cidade:</td>'.'<td align="left">  ' . $cliente->cidade . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Uf:</td>'.'<td align="left">  ' . $cliente->uf . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Estado civil:</td>'.'<td align="left">  ' . $cliente->estado_civil . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Nacionalidade:</td>'.'<td align="left">  ' . $cliente->nacionalidade . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Profissão:</td>'.'<td align="left">  ' . $cliente->profissao . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Renda:</td>'.'<td align="left">  ' . "R$ " . number_format($cliente->renda,2,',','.') . '</td></tr>';



}
$html .='</table>';
$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
$pdf->Output('Reporte.pdf', 'I');
?>		