<?php

include_once 'funcoes.php';

date_default_timezone_set('America/Sao_Paulo');

// variaveis recebidas do formulario de cadastro

$id        = $_POST['cod'];
$situac     = $_POST['nome'];
$obs       = $_POST['obs'];

$insert = exeBD("UPDATE `situacao` SET `SIT_NOME`='$situac',`SIT_OBS`='$obs' WHERE  SIT_COD=$id");
           
if($insert)
{
   echo"<script language='javascript' type='text/javascript'>alert('Alterado com sucesso!');window.location.href='../consult_situacao.php?cod=$id'</script>";
}
else
{
   echo"<script language='javascript' type='text/javascript'>alert('N&atilde;o foi poss&iacute;vel alterar! ERRO 12052017');window.location.href='../consult_situacao.php?cod=$id'</script>";
}

?>
