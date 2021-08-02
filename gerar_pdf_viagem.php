<?php	

	include_once("conexao.php");
	$html = '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Nome</th>';
	$html .= '<th>Data</th>';
	$html .= '<th>Valor</th>';
	
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';

		$html .= '<tr><td>'.$pesq['nomeMotorista'] . "</td>";
		$html .= '<td>'.$pesq['data'] . "</td>";
		$html .= '<td>'.$pesq['valor'] . "</td></tr>";
		
	
	$html .= '</tbody>';
	$html .= '</table';

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">RELATÓRIO MENSAL DE VIAGENS POR MOTORISTA</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_viagens.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>