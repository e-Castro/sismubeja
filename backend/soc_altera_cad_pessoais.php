<?php
session_start();
include_once '../funcoes.php';

date_default_timezone_set('America/Sao_Paulo');

// variaveis recebidas do formulario de cadastro
$repres      = $_SESSION['usuarioSession'];
$cod         = $_POST['cod'];
$nome        = $_POST['nome'];
$dtnasc      = $_POST['dtnasc'];
$sexo        = $_POST['sex'];
$nascionalid = $_POST['nacionalid'];
$naturalid   = $_POST['naturalid'];
$ufnatural   = $_POST['ufnatural'];
$estcivil    = $_POST['estcivil'];
$apelido     = $_POST['apelido'];
$pai         = $_POST['pai'];
$mae         = $_POST['mae'];

$timestamp = date("Y-m-d H:i:s");

$insert = exeBD("UPDATE sociosb SET SOC_NOME='$nome',SOC_APELIDO='$apelido',SOC_DTNASC='$dtnasc',SOC_SEXO='$sexo',
SOC_NACION='$nascionalid',SOC_EST_ESTCIV='$estcivil',SOC_NATURALID='$naturalid',SOC_UF_NATURAL='$ufnatural',
SOC_PAI='$pai',SOC_MAE='$mae',SOC_MODIF_EM='$timestamp',SOC_MODIF_POR='$repres' WHERE SOC_COD=$cod");


if($insert)
{
   echo"<script language='javascript' type='text/javascript'>alert('Socio alterado com sucesso!');window.location.href='../consult_socios.php?id=$cod'</script>";
}
else
{
    echo"<script language='javascript' type='text/javascript'>alert('N&atilde;o foi poss&iacute;vel alterar esse Socio! ERRO 12052017');window.location.href='../consult_socios.php?id=$cod'</script>";
}

?>
