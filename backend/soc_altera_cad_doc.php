<?php
session_start();
include_once '../funcoes.php';

date_default_timezone_set('America/Sao_Paulo');

// variaveis recebidas do formulario de cadastro
$repres      = $_SESSION['usuarioSession'];

$cod         = $_POST['cod'];
$rg          = $_POST['rg'];
$rgexp       = $_POST['rgexp'];
$ufrg        = $_POST['ufrg'];
$cpf         = $_POST['cpf'];
$ctps        = $_POST['ctps'];
$ctpsserie   = $_POST['ctpsserie'];
$ctpsexp     = $_POST['ctpsexp'];
$profissao   = $_POST['profissao'];
$titulo      = $_POST['titulo'];
$titzona     = $_POST['titzona'];
$titsecao    = $_POST['titsecao'];
$nivelform   = $_POST['nivelform'];
$mat         = $_POST['mat'];
$mat2        = $_POST['mat2'];
$profissao   = $_POST['profissao'];
$pis         = $_POST['pis'];
$instit      = $_POST['instit'];
$cargo       = $_POST['cargo'];
$lotacao     = $_POST['lotacao'];
$cargolotac  = $_POST['cargolotac'];

$timestamp = date("Y-m-d H:i:s");

$insert = exeBD("UPDATE sociosb SET SOC_RG='$rg', SOC_RG_DTEXP='$rgexp', SOC_UFRG='$ufrg',
SOC_CPF='$cpf', SOC_CTPS='$ctps',SOC_CTPSSERIE='$ctpsserie', SOC_CTPSEXP='$ctpsexp',
SOC_TITULO='$titulo',SOC_TITZONA='$titzona', SOC_TITSE='$titsecao',SOC_PROFISSAO='$profissao',
SOC_PROFISSAO='$profissao',SOC_NIVELFORM='$nivelform',SOC_MAT='$mat', SOC_PIS='$pis',
SOC_INSTIT='$instit', SOC_CARGO='$cargo', SOC_LOTACAO='$lotacao',SOC_CARG_LOTAC='$cargolotac',
SOC_MODIF_EM='$timestamp',SOC_MODIF_POR='$repres', SOC_MAT2='$mat2' WHERE SOC_COD = $cod");
           
if($insert)
{
   echo"<script language='javascript' type='text/javascript'>alert('Socio alterado com sucesso!');window.location.href='../consult_socios.php?id=$cod'</script>";
}
else
{
   echo"<script language='javascript' type='text/javascript'>alert('N&atilde;o foi poss&iacute;vel alterar esse Socio! ERRO 12052017');window.location.href='../consult_socios.php?id=$cod'</script>";
}

?>
