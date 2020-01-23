<?php

include_once '../funcoes.php';

date_default_timezone_set('America/Sao_Paulo');

// variaveis recebidas do formulario de cadastro

$id    = $_GET['id'];

$insert = exeBD("UPDATE `sociosb` SET `SOC_DTCADASTRO`= now(),`SOC_SITUAC`= '1', `SOC_DTDESF`= Null WHERE  SOC_COD=$id");
           
if($insert)
{
   echo"<script language='javascript' type='text/javascript'>alert('Socio ativo com sucesso! verificar \"SITUAÇÃO DO SÓCIO\", para ATIVO, PENSIONISTA ou APOSENTADO!');window.location.href='../consult_socios.php?id=$id'</script>";
}
else
{
   echo"<script language='javascript' type='text/javascript'>alert('N&atilde;o foi poss&iacute;vel alterar esse Socio! ERRO 12052017');window.location.href='../consult_socios.php?id=$id'</script>";
}

?>
