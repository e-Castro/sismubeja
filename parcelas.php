<?php

include 'funcoes.php';
$data = Date('d/m/Y');

$parcelas = 4;

$total = 3525.35;

$venc = explode("/",$data);

$soma = 0;

for($i=0;$i<$parcelas;$i++)

{

$parc[$i+1]= date("d/m/Y",mktime(0,0,0,$venc[1]+$i,$venc[0],$venc[2]));

$valor[$i+1] = round($total/$parcelas,2);

$soma += $valor[$i+1];

}

if($soma>$total)

$valor[$parcelas] += ($total-$soma);

/*echo "<br>";
dataPromissoria($data);
echo "<br>";
echo valor_por_extenso(reais($total),true,false);
echo "<br>";*/

for($i=1;$i<=$parcelas;$i++)

echo "<br>Parcela $i : Vencimento: $parc[$i]".dataPromissoria($parc[$i])." Valor: ".number_format($valor[$i],2), valor_por_extenso(reais($valor[$i]),true,false)."<br>";

?>