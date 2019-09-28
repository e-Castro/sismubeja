<?php
session_start();
include_once '../funcoes.php';

date_default_timezone_set('America/Sao_Paulo');

// variaveis recebidas do formulario de cadastro
$repres      = $_SESSION['usuarioSession'];

$cod         = $_POST['cod'];
$end         = $_POST['end'];
$num         = $_POST['num'];
$bairro      = $_POST['bairro'];
$distrito    = $_POST['distrito'];
$cidade      = $_POST['cidade'];
$email       = $_POST['email'];
$cep         = $_POST['cep'];
$uf          = $_POST['uf'];
$tel         = $_POST['tel'];
$cel         = $_POST['cel'];
$gaveta      = $_POST['gaveta'];
$modifPor    = $repres;

$timestamp = date("Y-m-d H:i:s");

$insert = exeBD("UPDATE sociosb SET SOC_END='$end',SOC_NUM='$num',SOC_BAIRRO='$bairro',
SOC_DIS_DISTRIT='$distrito',SOC_CIDADE='$cidade',SOC_EMAIL='$email',SOC_CEP='$cep',SOC_UF='$uf',
SOC_TEL='$tel',SOC_CEL='$cel',SOC_GAVETA='$gaveta',SOC_MODIF_EM='$timestamp',SOC_MODIF_POR='$modifPor' WHERE SOC_COD = $cod");
           
if($insert)
{
   echo"<script language='javascript' type='text/javascript'>alert('Socio alterado com sucesso!');window.location.href='../consult_socios.php?id=$cod'</script>";
}
else
{
   echo"<script language='javascript' type='text/javascript'>alert('N&atilde;o foi poss&iacute;vel alterar esse Socio! ERRO 12052017');window.location.href='../consult_socios.php?id=$cod'</script>";
}

?>
