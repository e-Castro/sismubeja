<?php

include_once 'funcoes.php';

date_default_timezone_set('America/Sao_Paulo');

// variaveis recebidas do formulario de cadastro

$id        = $_POST['id'];
$bairro     = $_POST['nome'];
$obs       = $_POST['obs'];

$insert = exeBD("UPDATE `bairros` SET `BAI_NOME`='$bairro',`BAI_OBS`='$obs' WHERE  BAI_ID=$id");
           
if($insert)
{
   echo"<script language='javascript' type='text/javascript'>alert('Socio alterado com sucesso!');window.location.href='../consult_bairros.php?cbo1=$id'</script>";
}
else
{
   echo"<script language='javascript' type='text/javascript'>alert('N&atilde;o foi poss&iacute;vel alterar esse Socio! ERRO 12052017');window.location.href='../consult_bairros.php?cbo1=$id'</script>";
}

?>
