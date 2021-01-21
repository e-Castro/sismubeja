<?php

include_once 'funcoes.php';

date_default_timezone_set('America/Sao_Paulo');

// variaveis recebidas do formulario de cadastro

$fantasia = $_POST['fantasia'];
$rsocial = $_POST['rsocial'];
$cnpj = $_POST['cnpj'];
$insestadual = $_POST['insestadual'];
$cidade = $_POST['cidade'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$uf = $_POST['uf'];
$cep = $_POST['cep'];
$cargo = $_POST['cargo'];
$contato = $_POST['contato'];
$telefone = $_POST['telefone'];
$whatsapp = $_POST['whatsapp'];
$email = $_POST['email'];
$observacoes = $_POST['observacoes'];

//$timestamp = date("Y-m-d H:i:s");

$select = exeBD("SELECT * FROM empresa WHERE emp_cnpj = '$cnpj'");
$array = mysqli_fetch_array($select);
$logarray = $array['emp_cnpj'];

if ($cnpj = "")
{
   $js="<script language='javascript'>alert('Devem ser preenchidos todos os campos com ( * ), e confirmado o envio no final do Formulario!')</script>";
   print $js;
   $js="<script language='javascript'>javascript:history.back(-1)</script>";
   print $js;

   return false;
}
else
{
   if($logarray == $cpf)
   {
       $js="<script language='javascript'>alert('CNPJ já cadastrado!')</script>";
       print $js;
       $js="<script language='javascript'>javascript:history.back(-1)</script>";
       print $js;

       return false;
   }
else
{
	//Insere os dados no banco
	
	$insert = exeBD("INSERT INTO `empresa`(id_empresa, emp_fantasia, emp ) VALUES (DEFAULT, '$fantasia','$rsocial')");
	
	if(isset($insert))
	{
		$consult = exeBD("SELECT * FROM sociosb WHERE SOC_CPF LIKE '$cpf'");
		$result = mysqli_fetch_array($consult);
		$id = $result['SOC_COD'];
		echo"<script language='javascript' type='text/javascript'>alert('Socio: \" $nome \" - cadastrado com sucesso!');window.location.href='../consult_socios.php?id=$id'</script>";
	}
	else
	{
		echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse Socio! ERRO ref:12052017');window.location.href='soc_cadastro.php'</script>";
	}

}

?>
