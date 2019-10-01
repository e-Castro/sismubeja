<?php
session_start();
include_once 'funcoes.php';

date_default_timezone_set('America/Sao_Paulo');

// variaveis recebidas do formulario de cadastro
$repres      = $_SESSION['usuarioSession'];

$cod         = $_POST['cod'];
$situac      = $_POST['sit'];
$portadmis   = $_POST['portadmis'];
$dtadmissao  = $_POST['dtadmissao'];
$portadmis2   = $_POST['portadmis2'];
$dtadmissao2  = $_POST['dtadmissao2'];
$portaposent = $_POST['portaposent'];
$dtaposent   = $_POST['dtaposent'];
$numbenef    = $_POST['numbenef'];
$dtbenef     = $_POST['dtbenef'];
$dtfalec     = $_POST['dtfalec'];
$mensagem    = $_POST['obs'];

$timestamp = date("Y-m-d H:i:s");

$insert = exeBD("UPDATE sociosb SET SOC_SITUAC='$situac',SOC_PORT_ADMIS='$portadmis',SOC_DTADMISSAO='$dtadmissao',
SOC_PORT_APOS='$portaposent',SOC_DTAPOSENT='$dtaposent',SOC_NUM_BENEF='$numbenef',SOC_DTBENEF='$dtbenef',
SOC_DTFALEC='$dtfalec',SOC_OBS='$mensagem',SOC_MODIF_EM='$timestamp',SOC_MODIF_POR='$repres', SOC_DTADMISSAO2='$dtadmissao2', SOC_POR_ADMIS2='$portadmis2' WHERE SOC_COD = $cod");

if($insert)
{
   echo"<script language='javascript' type='text/javascript'>alert('Socio alterado com sucesso!');window.location.href='../consult_socios.php?id=$cod'</script>";
}
else
{
   echo"<script language='javascript' type='text/javascript'>alert('N�o foi poss&iacute;vel alterar esse Socio! ERRO 12052017');window.location.href='../consult_socios.php?id=$cod'</script>";
}

?>
