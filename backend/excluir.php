<?php
include_once 'funcoes.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$tabela  = $_GET['tabela'];
$dado = $_GET['dado'];
$campo = 'id_aluno';

$notas = exeBD("DELETE FROM `$tabela` WHERE `PRE_SOC_COD` = $dado");
if ($notas == true) {
    echo "<script language='javascript' type='text/javascript'>alert('Presença excluido com sucesso!');window.location.href='../form_presenca.php';</script>";
} else {
    echo "<script language+'javascript' type='text/javascript'>alert('Deu merda!);window.location.href='../form_presenca.php';</script>";
}

?>