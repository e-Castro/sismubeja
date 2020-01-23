<?php

include_once '../funcoes.php';

date_default_timezone_set('America/Sao_Paulo');

// variaveis recebidas do formulario de cadastro

$id    = $_GET['id'];

$insert = exeBD("SELECT * FROM `sociosb` WHERE  `SOC_COD` = $id");
$d = mysqli_fetch_array($insert);

$nome = $d['SOC_NOME'];
$data = $d['SOC_MODIF_EM'];
$operador = $d['SOC_MODIF_POR'];
$data = ConverteData($data);
           
if($insert)
{
   echo"<script language='javascript' type='text/javascript'>alert('Socio(a): $nome, foi alterado em: $data pelo usuário: $operador.');window.location.href='../consult_socios.php?id=$id'</script>";
}
else
{
   echo"<script language='javascript' type='text/javascript'>alert('Não foi possível verificar esse Socio! ERRO 12052017');window.location.href='../consult_socios.php?id=$id'</script>";
}

?>
