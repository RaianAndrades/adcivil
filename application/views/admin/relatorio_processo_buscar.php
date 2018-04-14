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
$html ='<h2 style="text-align:center"><font color="#000">Relatório de processo</font></h2>';
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

//inicio clientes
$html .='<h2 style="text-align:center"><font color="#000">Clientes</font></h2>';
$html .='<br><br><br><table border="1" >';
$html .='<tr style="background-color:#4169E1; color:#FFF; text-align: center; ">

	<th>Nome</th>
	<th>RG</th>
	<th>Telefone</th>
	<th>Cidade</th>
	</tr>';

	foreach($processos_clientes as $pc) {
		$i++;
		if(($i % 2) == 0) {
			$style = 'style="background-color:#DCDCDC"';
		} else {
			$style = "";
		}
	$html .='<tr ' . $style . '><td align="center">' . $pc->nome_cliente . '</td>';
	$html .='<td align="center">' . $pc->rg . '</td>';
	$html .='<td align="center">' . $pc->telefoneOne . '</td>';
	$html .='<td align="center">' . $pc->cidade . '</td></tr>';
}

$html .='</table>';
//final clientes

//inicio advogados
$html .='<h2 style="text-align:center"><font color="#000">Advogados</font></h2>';
$html .='<br><br><br><table border="1" >';
$html .='<tr style="background-color:#4169E1; color:#FFF; text-align: center; ">

	<th>Nome</th>
	<th>RG</th>
	<th>Telefone</th>
	<th>Cidade</th>
	</tr>';

	foreach($processos_advogados as $pa) {
		$i++;
		if(($i % 2) == 0) {
			$style = 'style="background-color:#DCDCDC"';
		} else {
			$style = "";
		}
	$html .='<tr ' . $style . '><td align="center">' . $pa->nome_advogado . '</td>';
	$html .='<td align="center">' . $pa->rg . '</td>';
	$html .='<td align="center">' . $pa->telefoneOne . '</td>';
	$html .='<td align="center">' . $pa->cidade . '</td></tr>';
}

$html .='</table>';
//final advogados

//inicio outras partes
$html .='<h2 style="text-align:center"><font color="#000">Outras partes</font></h2>';
$html .='<br><br><br><table border="1" >';
$html .='<tr style="background-color:#4169E1; color:#FFF; text-align: center; ">

	<th>Nome</th>
	<th>Telefone</th>
	<th>Cidade</th>
	</tr>';

	foreach($processos_outras_partes as $po) {
		$i++;
		if(($i % 2) == 0) {
			$style = 'style="background-color:#DCDCDC"';
		} else {
			$style = "";
		}
	$html .='<tr ' . $style . '><td align="center">' . $po->nome_outra_parte . '</td>';
	$html .='<td align="center">' . $po->telefoneOne . '</td>';
	$html .='<td align="center">' . $po->cidade . '</td></tr>';
}

$html .='</table>';
//final outras partes

//inicio testemunhas
$html .='<h2 style="text-align:center"><font color="#000">Testemunhas </font></h2>';
$html .='<br><br><br><table border="1" >';
$html .='<tr style="background-color:#4169E1; color:#FFF; text-align: center; ">

	<th>Nome</th>
	<th>Telefone</th>
	<th>Cidade</th>
	</tr>';

	foreach($processos_testemunhas as $pt) {
		$i++;
		if(($i % 2) == 0) {
			$style = 'style="background-color:#DCDCDC"';
		} else {
			$style = "";
		}
	$html .='<tr ' . $style . '><td align="center">' . $pt->nome_testemunha . '</td>';
	$html .='<td align="center">' . $pt->telefoneOne . '</td>';
	$html .='<td align="center">' . $pt->cidade . '</td></tr>';
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

//inicio financeiro
$html .='<h2 style="text-align:center"><font color="#000">Financeiro</font></h2>';
$html .='<br><br><br><table border="1" >';
$html .='<tr style="background-color:#4169E1; color:#FFF; text-align: center; ">
	<th colspan="2"></th>
	</tr>';

	foreach($processos as $processo) {
		$i++;
		if(($i % 2) == 0) {
			$style = 'style="background-color:#DCDCDC"';
		} else {
			$style = "";
		}
	$html .='<tr ' . $style . '><td align="left">  Valor da causa:</td>'.'<td align="left">  ' . "R$ " . number_format($processo->valor_causa,2,',','.') . '</td></tr>';
	$html .='<tr><td align="left">  Custas:</td>'.'<td align="left">  ' . "R$ " . number_format($processo->custas,2,',','.') . '</td></tr>';
	$html .='<tr><td align="left">  Honorários:</td>'.'<td align="left">  ' . "R$ " . number_format($processo->honorarios,2,',','.') . '</td></tr>';
	$html .='<tr><td align="left">  Outras despesas:</td>'.'<td align="left">  ' . "R$ " . number_format($processo->outras_despesas,2,',','.') . '</td></tr>';
}
$html .='</table>';
//final financeiro

//inicio outras informações
$html .='<h2 style="text-align:center"><font color="#000">Outras Informações</font></h2>';
$html .='<br><br><br><table border="1" >';
$html .='<tr style="background-color:#4169E1; color:#FFF; text-align: center; ">
	<th colspan="2"></th>
	</tr>';

	foreach($processos as $processo) {
		$i++;
		if(($i % 2) == 0) {
			$style = 'style="background-color:#DCDCDC"';
		} else {
			$style = "";
		}
	$html .='<tr ' . $style . '><td align="left">  Situação conjugal:</td>'.'<td align="left"> ' . ucwords($processo->situacao_conjugal) . '</td></tr>';
	$html .='<tr><td align="left">  Casado regime:</td>'.'<td align="left">  ' . $processo->casado_regime . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Possui filhos menores?:</td>'.'<td align="left">  ' .ucwords($processo->possui_filhos_menores) . '</td></tr>';
	$html .='<tr><td align="left">  Quantos  púberes?:</td>'.'<td align="left">  ' . $processo->quantos_puberes. '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Quantos  impúberes?:</td>'.'<td align="left">  ' . ucwords($processo->quantos_impuberes). '</td></tr>';
	$html .='<tr><td align="left">  Quantos  maiores?:</td>'.'<td align="left">  ' . $processo->quantos_maiores. '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Possui bens?:</td>'.'<td align="left">  ' . $processo->possui_bens. '</td></tr>';
	$html .='<tr><td align="left">  Quais?:</td>'.'<td align="left">  ' . $processo->quais . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Pretende pensão alimenticia?:</td>'.'<td align="left">  ' .$processo->pretende_pensao_alimenticia. '</td></tr>';
	$html .='<tr><td align="left">  Para si?:</td>'.'<td align="left">  ' . $processo->para_si . '</td></tr>';
	$html .='<tr ' . $style . '><td align="left">  Para os filhos?:</td>'.'<td align="left">  ' . $processo->para_os_filhos . '</td></tr>';
	$html .='<tr><td align="left">  Renda alimentante:</td>'.'<td align="left">  ' . $processo->renda_alimentante . '</td></tr>';
}
$html .='</table>';
//final outras informações
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