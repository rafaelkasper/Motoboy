<?php
//INCLUI O NOME E A DATA NAS PÁGINAS
//include 'conecta_banco.php';
echo '<br>';
//echo "Bem-vindo(a) " . "<b>".ucfirst($login) . "</b>". ", hoje é dia ";
echo "<p style='font-family: 'Open Sans',sans-serif;'>"."Bem-vindo". ", hoje é dia ";
$meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
$dia = date("d", time());
$mes = date("m", time());
$ano = date("Y", time());

echo $dia . " de " . $meses [$mes - 1] . " de " . $ano;
echo '</p';

