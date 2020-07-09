<?php

include_once 'funcoes.php';

date_default_timezone_set('America/Sao_Paulo');

// variaveis recebidas do formulario de cadastro

$id = $_POST['cod'];
$instituicao = $_POST['nome'];
$obs = $_POST['obs'];

$insert = exeBD("UPDATE `instituicao` SET `INS_NOME`='$instituicao',`INS_OBS`='$obs' WHERE  INS_COD=$id");
           
if($insert)
{
   echo"<script language='javascript' type='text/javascript'>alert('Alterado com sucesso!');window.location.href='../consult_instituicao.php?cod=$id'</script>";
}
else
{
   echo"<script language='javascript' type='text/javascript'>alert('Não foi possível alterar! ERRO 12052017');window.location.href='../consult_instituicao.php?cod=$id'</script>";
}

?>
