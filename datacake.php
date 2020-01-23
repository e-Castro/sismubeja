<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
echo strftime('%A, %d de %B de %Y', strtotime('today'));
echo "<hr>";

//Define informações locais 
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$data = Date('Y-m-d');

//Converter a data para o formato brasileiro
echo "Data no formato salvo no banco de dados: " . date('d/m/Y H:i:s', strtotime($data)) . "<br>";
//Converte a data por extenso
echo "Data por extenso: " . strftime('%A, %d de %B de %Y', strtotime($data)) . "<hr>";
