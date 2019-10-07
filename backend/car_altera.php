<?php

include_once 'funcoes.php';

date_default_timezone_set('America/Sao_Paulo');

// variaveis recebidas do formulario de cadastro

$id        = $_POST['id'];
$cbo       = $_POST['cbo'];
$cargo     = $_POST['cargo'];
$obs       = $_POST['obs'];

$insert = exeBD("UPDATE `cargos` SET `CAR_COD`='$cbo',`CAR_NOME`='$cargo',`CAR_OBS`='$obs' WHERE  CAR_ID=$id");
           
if($insert)
{
   echo"<script language='javascript' type='text/javascript'>alert('Socio alterado com sucesso!');window.location.href='../consult_cargos.php?cbo1=$cbo'</script>";
}
else
{
   echo"<script language='javascript' type='text/javascript'>alert('N&atilde;o foi poss&iacute;vel alterar esse Socio! ERRO 12052017');window.location.href='../consult_cargos.php?cbo1=$cbo'</script>";
}

?>
