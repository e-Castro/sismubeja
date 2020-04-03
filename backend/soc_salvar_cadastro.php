<?php

include_once 'funcoes.php';

date_default_timezone_set('America/Sao_Paulo');

// variaveis recebidas do formulario de cadastro

$cod         = $_POST['cod'];
$nome        = $_POST['nome'];
$foto        = $_FILES["foto"];
$dtnasc      = $_POST['dtnasc'];
$sexo        = $_POST['sex'];
$nascionalid = $_POST['nacionalid'];
$naturalid   = $_POST['naturalid'];
$ufnatural   = $_POST['ufnatural'];
$estcivil    = $_POST['estcivil'];
$apelido     = $_POST['apelido'];
$pai         = $_POST['pai'];
$mae         = $_POST['mae'];

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
$gaveta		 = $_POST['gaveta'];

$rg          = $_POST['rg'];
$rgexp		 = "0000-01-01";
$rgexp       = $_POST['rgexp'];
$ufrg        = $_POST['ufrg'];
$cpf         = $_POST['cpf'];
$ctps        = $_POST['ctps'];
$ctpsserie   = $_POST['ctpsserie'];
$ctpsexp	 = "0000-01-01";
$ctpsexp     = $_POST['ctpsexp'];
$profissao   = $_POST['profissao'];
$titulo      = $_POST['titulo'];
$titzona     = $_POST['titzona'];
$titsecao    = $_POST['titsecao'];
$mat         = $_POST['mat'];
$nivelform   = $_POST['nivelform'];
$pis 		 = $_POST['pis'];
$instit      = $_POST['instit'];
$cargo       = $_POST['cargo'];
$lotacao     = $_POST['lotacao'];
$cargolotac  = $_POST['cargolotac'];

$situac      = $_POST['sit'];
$portadmis   = $_POST['portadmis'];
$dtadmissao	 = "0000-01-01";
$dtadmissao  = $_POST['dtadmissao'];
$portaposent = $_POST['portaposent'];
$dtaposent	 = "0000-01-01";
$dtaposent   = $_POST['dtaposent'];
$numbenef    = $_POST['numbenef'];
$dtbenef	 = "0000-01-01";
$dtbenef     = $_POST['dtbenef'];
$dtfalec	 = "0000-01-01";
$dtfalec     = $_POST['dtfalec'];
$mensagem    = $_POST['mensagem'];

$timestamp = date("Y-m-d H:i:s");

$select = exeBD("SELECT * FROM SOCIOSB WHERE SOC_CPF = '$cpf'");


if($logarray == $cpf)
{
	$js="<script language='javascript'>alert('CPF já cadastrado!')</script>";
	print $js;
	$js="<script language='javascript'>javascript:history.back(-1)</script>";
	print $js;

	return false;
}
else
{
	//Insere os dados no banco
	
	$insert = exeBD("INSERT INTO `sociosb`(`SOC_COD`, `SOC_DTCADASTRO`, `SOC_NOME`, `SOC_APELIDO`, `SOC_DTNASC`, `SOC_SEXO`, `SOC_NACION`, 
	`SOC_EST_ESTCIV`, `SOC_NATURALID`, `SOC_UF_NATURAL`, `SOC_PAI`, `SOC_MAE`, `SOC_END`, `SOC_NUM`, `SOC_BAIRRO`, `SOC_DIS_DISTRIT`, `SOC_CIDADE`, 
	`SOC_UF`, `SOC_CEP`, `SOC_EMAIL`, `SOC_TEL`, `SOC_CEL`, `SOC_RG`, `SOC_RG_DTEXP`, `SOC_UFRG`, `SOC_CPF`, `SOC_CTPS`, `SOC_CTPSSERIE`, `SOC_CTPSEXP`, 
	`SOC_TITULO`, `SOC_TITZONA`, `SOC_TITSE`, `SOC_PROFISSAO`, `SOC_NIVELFORM`, `SOC_MAT`, `SOC_INSTIT`, `SOC_CARGO`, `SOC_LOTACAO`, `SOC_CARG_LOTAC`, 
	`SOC_SITUAC`, `SOC_PORT_ADMIS`, `SOC_DTADMISSAO`, `SOC_PORT_APOS`, `SOC_DTAPOSENT`, `SOC_NUM_BENEF`, `SOC_DTBENEF`, `SOC_DTFALEC`, `SOC_OBS`, 
	`SOC_GAVETA`, `SOC_PIS`) VALUES (DEFAULT,now(),'$nome','$apelido','$dtnasc','$sexo','$nascionalid','$estcivil',
	'$naturalid','$ufnatural','$pai','$mae','$end','$num','$bairro','$distrito','$cidade','$uf','$cep',
	'$email','$tel','$cel','$rg','$rgexp','$ufrg','$cpf','$ctps','$ctpsserie','$ctpsexp','$titulo','$titzona',
	'$titsecao','$profissao','$nivelform','$mat','$instit','$cargo','$lotacao','$cargolotac','$situac',
	'$portadmis','$dtadmissao','$portaposent','$dtaposent','$numbenef','$dtbenef','$dtfalec','$mensagem','$gaveta','$pis')");
	
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
