<?php

include_once 'funcoes.php';

date_default_timezone_set('America/Sao_Paulo');

// variaveis recebidas do formulario de cadastro

$id        = $_POST['cod'];
$dist     = $_POST['nome'];
$obs       = $_POST['obs'];

$insert = exeBD("UPDATE `distrito` SET `DIS_NOME`='$dist',`DIS_OBS`='$obs' WHERE  DIS_COD=$id");
           
if($insert)
{
   echo"<script language='javascript' type='text/javascript'>alert('Socio alterado com sucesso!');window.location.href='../consult_distritos.php?cod=$id'</script>";
}
else
{
   echo"<script language='javascript' type='text/javascript'>alert('N&atilde;o foi poss&iacute;vel alterar esse Socio! ERRO 12052017');window.location.href='../consult_distritos.php?cod=$id'</script>";
}

?>
