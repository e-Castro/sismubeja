<?php
include_once 'funcoes.php';
include_once 'restrito.php';
$ip = getenv("REMOTE_HOST"); // captura o ip do visitante

//session_start(); //Inicia a sess�o
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//PT" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..:: INTRANET - SISMUBEJA ::..</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Archivo+Narrow:400,700" rel="stylesheet" type="text/css">
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body>

<h1 align="center"><span>Formul&aacute;rio - </span>Consulta de Socios</h1>

<?php
$repres = $_SESSION['usuarioSession'];
$prmt = $_GET['paramet'];
$cod1 = $_GET['senha'];

if($prmt!='SOC_COD'){
    if($prmt==''){
         $sql = exeBD("SELECT * FROM sociosb WHERE SOC_COD LIKE $cod1");
    }else{
	    if($prmt!='SOC_COD'){
             $sql = exeBD("SELECT * FROM sociosb WHERE $prmt LIKE '$cod1'");
        }
    }
}else{
	$sql = exeBD("SELECT * FROM sociosb WHERE SOC_COD LIKE $cod1");
}

if (mysqli_num_rows($sql)<=0)
   {
      echo"<script language='javascript' type='text/javascript'>alert('Socio nao localizado');window.location.href='soc_localizar.php';</script>";
      die();
   }
// Exibe as informações de cada usuário
$dados = mysqli_fetch_array($sql);

$cod   = $dados['SOC_COD'];
$data  = date('Y-m-d H:i');
$nome  = $dados['SOC_NOME'];
$prot  = '1245';
$datav = date('Y-m-d',strtotime("+51 day"));
$cpf   = $dados['SOC_CPF'];
$rg    = $dados['SOC_RG'];
$sit   = $dados['SOC_SITUAC'];
$mat   = $dados['SOC_MAT'];
//$codInt= (int) $cod;
//$prox  = $codInt+1;
//$ant   = $codInt-1;
$prox  = $cod+1;
$ant   = $cod-1;

echo "<p align='center'><a href=\"soc_altera.php? paramet=SOC_COD&senha=$ant\" title='Anterior'><img src=images/icons8-voltar-30.png></a>";
echo "<img src=images/spaco.jpg>";
echo "<a href=\"soc_ficha_desconto.php? senha=$cod\" title='Impress&atilde;o da Ficha de Filia&ccedil;&atilde;o'><img src=images/icons8-filiacao-40.png></a>";
echo "<img src=images/spaco.jpg>";
echo "<a href=\"soc_ficha_cad.php? senha=$cod\" title='Impress&atilde;o da Ficha de Cadastramento!'><img src=images/ficha-cadastral-40.png></a>";
echo "<img src=images/spaco.jpg>";
echo "<a href=\"soc_carteira.php? cod=$cod&nome=$nome&cpf=$cpf&rg=$rg&sit=$sit&mat=$mat\" title='Carteira de Identidade Sindical'><img src=images/identidade-40.png></a>";
echo "<img src=images/spaco.jpg>";
echo "<a href=\"soc_altera.php? paramet=SOC_COD&senha=$prox\" title='Anterior'><img src=images/icons8-avancar-30.png></a>";
echo "</p>";

?>
<form action="soc_altera_cad_pessoais.php? repres='$repres" method="POST" enctype="multipart/form-data">
    <TABLE width="800" ALIGN="CENTER" BORDER="0">
      <TR>
          <TD colspan="6" size="150" ><B>DADOS PESSOAIS:</B></TD>
      </TR>
      <TR >
          <TD><B>C&oacute;digo:</B>NOVO/ANTIGO:</TD><TD>Nome:</TD><TD></TD><TD></TD><TD></TD>
          <TD rowspan="11">
              <TABLE ALIGN="CENTER" BORDER="0">
                     <TR>
                         <TD >
                         <TABLE ALIGN="CENTER" BORDER="1" >
                                <TR>
                                    <TD>
                                        <?php $sql = exeBD("SELECT * FROM sociosb WHERE SOC_COD LIKE $cod ORDER BY SOC_NOME");
                                        // Exibe as informações de cada usuário
                                        while ($usuario = mysqli_fetch_object($sql)) {
	                                    // Exibimos a foto
	                                    echo "<img src='fotos/".$usuario->SOC_FOTO."' width='180' height='200' alt='Foto de exibição' /><br />";
                                        }?>
                                    </TD>
                                </TR>
                         </TABLE>
                         </TD>
                     </TR>
                     <TR>
                         <TD>
                             <?php echo "<a href=\"soc_foto.php? cod=$cod\" title='lterar Foto'><img src=images/icons8-editar-imagem-30.png></p>";?>
                         </TD>
                     </TR>
              </TABLE>
           </TD>
      </TR>
      <TR>
          <TD>
              <TABLE>
                     <TR>
                         <TD><input type="text" size="5" name="cod" readonly="readonly" value="<?php echo $dados["SOC_COD"];?>" /></TD>
                         <TD><input type="text" size="5" name="codant" readonly="readonly" value="<?php echo $dados["SOC_COD_ANT"];?>" /></TD>
                     </TR>
              </TABLE>
          <TD COLSPAN="3"><input type="text" size="50" name="nome" value="<?php echo $dados["SOC_NOME"];?>" /></TD>
      </TR>
      <TR>
          <TD>Data Nascimento:</TD><TD></font>Sexo:</TD><TD>Nacionalidade:</TD><TD>Naturalidade:</TD>
      </TR>
      <TR>
          <TD><input type="date" size="16" name="dtnasc" value="<?php echo $dados["SOC_DTNASC"];?>"></TD>
          <TD>
              <SELECT name="sex">
                 <option value="<?php echo $dados["SOC_SEXO"];?>"><?php echo $dados["SOC_SEXO"];?></option>
                 <?php
                 $result = exeBD("select * from sexo");
                 if(mysqli_num_rows($result) < 1) {
	                exit;
                 }
                 while($sex = mysqli_fetch_array($result)) { ?>
                 <option value="<?php echo $sex['SEX_NOME'] ?>"><?php echo $sex['SEX_NOME'] ?></option>
                  <?php } ?>
              </SELECT>
          </TD>
          <TD colspan=1><input type="text" size="11" name="nacionalid" value="<?php echo $dados["SOC_NACION"];?>"></TD>
          <TD colspan=1><input type="text" size="11" name="naturalid"  value="<?php echo $dados["SOC_NATURALID"];?>"></TD>
      </TR>
      <TR>
          <TD>UF Naturalidade:</TD><TD>Estado Civil:</TD><TD>Apelido:</TD>
      </TR>
      <TR>
          <TD>
              <SELECT name="ufnatural">
                 <option value="<?php echo $dados["SOC_UF_NATURAL"];?>"><?php echo $dados["SOC_UF_NATURAL"];?></option>
                 <?php
                 $resultado = exeBD("select * from uf");
                 if(mysqli_num_rows($resultado) < 1) {
	                exit;
                 }
                 while($uf = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $uf['UF_NOME'] ?>"><?php echo $uf['UF_NOME'] ?></option>
                  <?php } ?>
              </SELECT>
          </TD>
          <TD>
              <SELECT name="estcivil">
                 <option value="<?php echo $dados["SOC_EST_ESTCIV"];?>"><?php echo $dados["SOC_EST_ESTCIV"];?></option>
                 <?php
                 $resultado = exeBD("select * from estcivil");
                 if(mysqli_num_rows($resultado) < 1) {
                    exit;
                 }
                 while($estc = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $estc['EST_NOME'] ?>"><?php echo $estc['EST_NOME'] ?></option>
                 <?php } ?>
              </SELECT>
           </TD>
           <TD colspan=2><input type="text" size="32" name="apelido" value="<?php echo $dados["SOC_APELIDO"];?>"></TD>
      </TR>
      <TR>
          <TD>Pai:</TD>
      </TR>
      <TR>
          <TD colspan="6"><input type="text" size="73" name="pai" value="<?php echo $dados["SOC_PAI"];?>"></TD>
      </TR>
      <TR>
          <TD>M&atilde;e</TD>
      </TR>
      <TR>
          <TD colspan="6"><input type="text" size="73" name="mae" value="<?php echo $dados["SOC_MAE"];?>"></TD>
      </TR>
      </TABLE>
      <P align="center">
                <input type="submit"  name="BTEnvia" value="Alterar dados pessoais">
      </P>
      </form>

      <!----------------------------------FIM FORMULARIO-------------------------------------->

      <form action="soc_altera_cad_end.php" method="POST">

      <TABLE ALIGN="CENTER" BORDER="0">
      <TR>
          <TD colspan="6" bgcolor="#FF7F00"><B>ENDERE&Ccedil;O:</B></TD>
      </TR>
      <TR>
      <TD><input size="2" type="hidden" name="cod"  readonly="readonly" value="<?php echo $dados["SOC_COD"];?>" /></TD>
      </TR>
          <TD>Logradouro:</TD><TD></TD><TD></TD><TD>N&uacute;mero:</TD>
      </TR>
      <TR>
          <TD colspan=3><input type="text" size="90" name="end" value="<?php echo $dados["SOC_END"];?>"></TD>
          <TD colspan=1><input type="text" size="13" name="num" value="<?php echo $dados["SOC_NUM"];?>"></TD>

      </TR>
      <TR>
          <TD>Bairro:</TD><TD>Distrito:</TD><TD>Cidade:</TD><TD></TD>
      </TR>
      <TR>
          <TD colspan=1><input type="text" size="35" name="bairro" value="<?php echo $dados["SOC_BAIRRO"];?>"></TD>
          <TD colspan=1>
             <SELECT name="distrito">
                 <?php
                 $f = $dados["SOC_DIS_DISTRIT"];
                 $dist = "-";
                 $resultDist = exeBD("select * from distrito where DIS_COD like '$f'");
                 if(mysqli_num_rows($resultDist) != 1){
                     $dist;
                 }
                 $dist = mysqli_fetch_array($resultDist);?>

                 <option value="<?php echo $dist['DIS_COD'];?>"><?php echo $dist['DIS_NOME'];?></option>
                 
                 <?php
                 $resultado = exeBD("select * from distrito");
                 if(mysqli_num_rows($resultado) < 1) {
                    exit;
                 }
                 while($dist = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $dist['DIS_COD'] ?>"><?php echo $dist['DIS_NOME'] ?></option>
                 <?php } ?>
              </SELECT>
          </TD>
          <TD colspan=2><input type="text" size="32" name="cidade" value="<?php echo $dados["SOC_CIDADE"];?>"></TD>
      </TR>
      <TR>
          <TD>e-Mail:</TD><TD>CEP:</TD><TD>UF:</TD><TD>Telefone:</TD>
      </TR>
      <TR>
          <TD><input type="text" size="35" name="email" value="<?php echo $dados["SOC_EMAIL"];?>"></TD>
          <TD><input type="text" size="28" name="cep" value="<?php echo $dados["SOC_CEP"];?>"></TD>
          <TD>
              <SELECT name="uf">
                 <option value="<?php echo $dados["SOC_UF"];?>"><?php echo $dados["SOC_UF"];?></option>
                 <?php
                 $resultado = exeBD("select * from uf");
                 if(mysqli_num_rows($resultado) < 1) {
	                exit;
                 }
                 while($uf = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $uf['UF_NOME'] ?>"><?php echo $uf['UF_NOME'] ?></option>
                  <?php } ?>
              </SELECT>
          </TD>
          <TD><input type="text" size="13" name="tel" value="<?php echo $dados["SOC_TEL"];?>"></TD>
      </TR>
      <TR>
          <TD>Celular ou Whatsapp:</TD>
          <TD>Gaveta:</TD>
      </TR>
      <TR>
          <TD><input type="text" size="35" name="cel" value="<?php echo $dados["SOC_CEL"];?>"></TD>
          <TD><input type="text" size="28" name="gaveta" value="<?php echo $dados["SOC_GAVETA"];?>"></TD>
      </TR>
      </TABLE>
      <P align="center">
                <input type="submit" name="BTEnvia" value="Alterar endere&ccedil;o">
      </P>
      </form>

      <!----------------------------------FIM FORMULARIO-------------------------------------->

      <form action="soc_altera_cad_doc.php" method="POST">

      <TABLE ALIGN="CENTER" BORDER="0">

      <TR>
          <TD colspan="6" bgcolor="#FF7F00"><B>DOCUMENTA&Ccedil;&Atilde;O:</B></TD>
      </TR>
      <TR>
      <TD><input size="2" type="hidden" name="cod"  readonly="readonly" value="<?php echo $dados["SOC_COD"];?>" /></TD>
      </TR>
      <TR>
          <TD>RG/ORG.:</TD><TD>RG/Exprdi&ccedil;&atilde;o:</TD><TD>RG/UF:</TD><TD>CPF:</TD>
      </TR>
      <TR>
          <TD><input type="text" size="30" name="rg" value="<?php echo $dados["SOC_RG"];?>"></TD>
          <TD><input type="date" size="25" name="rgexp" value="<?php echo $dados["SOC_RG_DTEXP"];?>"></TD>
          <TD>
             <SELECT name="ufrg">
                 <option value="<?php echo $dados["SOC_UFRG"];?>"><?php echo $dados["SOC_UFRG"];?></option>
                 <?php
                 $resultado = exeBD("select * from uf");
                 if(mysqli_num_rows($resultado) < 1) {
	                exit;
                 }
                 while($uf = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $uf['UF_NOME'] ?>"><?php echo $uf['UF_NOME'] ?></option>
                  <?php } ?>
              </SELECT>
          </TD>
          <TD><input type="text" size="30" maxlength="14" name="cpf" placeholder="000.000.000-00" value="<?php echo $dados["SOC_CPF"];?>"></TD>


      </TR>
      <TR>
          <TD>CTPS:</TD><TD>Serie:</TD><TD>Expedi&ccedil;&atilde;o:</TD><TD>Profiss&atilde;o:</TD>
      </TR>
      <TR>
          <TD><input type="text" size="30" name="ctps" value="<?php echo $dados["SOC_CTPS"];?>"></TD>
          <TD><input type="text" size="16" name="ctpsserie" value="<?php echo $dados["SOC_CTPSSERIE"];?>"></TD>
          <TD><input type="date" size="25" maxlength="14" name="ctpsexp" value="<?php echo $dados["SOC_CTPSEXP"];?>"></TD>
          <TD><input type="text" size="30" name="profissao" value="<?php echo $dados["SOC_PROFISSAO"];?>"></TD>

      </TR>
      <TR>
          <TD>Titulo:</TD><TD>Zona:</TD><TD>Se&ccedil;&atilde;o:</TD><TD>Matricula:</TD>
      </TR>
      <TR>
          <TD><input type="text" size="30" name="titulo" value="<?php echo $dados["SOC_TITULO"];?>"></TD>
          <TD><input type="text" size="16" name="titzona" value="<?php echo $dados["SOC_TITZONA"];?>"></TD>
          <TD><input type="text" size="16" name="titsecao" value="<?php echo $dados["SOC_TITSE"];?>"></TD>
          <TD><input type="text" size="30" name="mat" value="<?php echo $dados["SOC_MAT"];?>"></TD>

      </TR>
      <TR>
          <TD colspan="2">N&iacute;vel/Forma&ccedil;&atilde;o:</TD><TD>PIS:</TD>
      </TR>
      <TR>
          <TD COLSPAN="2">
              <SELECT name="nivelform">
                 <?php
                 $f = $dados['SOC_NIVELFORM'];
                 $form="-";
                 $resultForm = exeBD("select * from formacao where FOR_COD like '$f'");
                 if(mysqli_num_rows($resultForm) < 1) {
	                $form;
                 }
                 while($form = mysqli_fetch_array($resultForm)) { ?>
                 ?>
                 <option value="<?php echo $form["FOR_COD"]; ?>"><?php echo $form["FOR_NOME"]; ?></option>
                 <?php }
                 
                 $resultado = exeBD("select * from formacao");
                 if(mysqli_num_rows($resultado) < 1) {
	                exit;
                 }
                 while($inst = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $inst['FOR_COD'] ?>"><?php echo $inst['FOR_NOME'] ?></option>
                 <?php } ?>
              </SELECT>
          </TD>
          <TD><input type="text" size="16" name="pis" value="<?php echo $dados["SOC_PIS"];?>"></TD>
      </TR>
      <TR>
          <TD COLSPAN="2">Institui&ccedil;&atilde;o:</TD><TD>Cargo:</TD>
      </TR>
      <TR>
          <TD COLSPAN="2">
              <SELECT name="instit">
                 <?php
                 $f = $dados['SOC_INSTIT'];
                 $inst="-";
                 $resultInst = exeBD("select * from instituicao where INS_COD like '$f'");
                 if(mysqli_num_rows($resultInst) < 1) {
	                $inst;
                 }
                 while($inst = mysqli_fetch_array($resultInst)) { ?>
                 ?>
                 <option value="<?php echo $inst["INS_COD"]; ?>"><?php echo $inst["INS_NOME"]; ?></option>
                 <?php }
                 
                 $resultado = exeBD("select * from instituicao");
                 if(mysqli_num_rows($resultado) < 1) {
	                exit;
                 }
                 while($inst = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $inst['INS_COD'] ?>"><?php echo $inst['INS_NOME']; ?></option>
                 <?php } ?>
              </SELECT>
          </TD>
          <TD COLSPAN="2">
              <SELECT name="cargo">
                 <?php
                 $f = $dados['SOC_CARGO'];
                 $carg="-";
                 $resultCarg = exeBD("select * from cargos where CAR_COD like '$f'");
                 if(mysqli_num_rows($resultCarg) != 1) {
	                $carg;
                 }
                 $carg = mysqli_fetch_array($resultCarg); ?>

                 <option value="<?php echo $carg['CAR_COD']; ?>"><?php echo $carg['CAR_NOME']; ?></option>
                 <?php 
                 $resultados = exeBD("select * from cargos");
                 if(mysqli_num_rows($resultados) < 1) {
	                exit;
                 }
                 while($carg = mysqli_fetch_array($resultados)) { ?>
                 <option value="<?php echo $carg['CAR_COD']; ?>"><?php echo $carg['CAR_NOME']; ?></option>
                 <?php } ?>
              </SELECT>
          </TD>
      <TR>
          <TD COLSPAN="2">Lota&ccedil;&atilde;o:</TD><TD>Cargo de Lota&ccedil;&atilde;o:</TD>
      </TR>
      <TR>   
          <TD COLSPAN=2>
              <SELECT name="lotacao">
                <?php
                 $f = $dados['SOC_LOTACAO'];
                 $lot = "-";
                 $resultLot = exeBD("select * from lotacao where LOT_COD like '$f'");
                 if(mysqli_num_rows($resultLot) != 1){
                     $lot;
                 }
                 $lot = mysqli_fetch_array($resultLot);?>
                 <option value="<?php echo $lot["LOT_COD"];?>"><?php echo $lot["LOT_NOME"];?></option>
                 <?php
                 $resultado = exeBD("select * from lotacao");
                 if(mysqli_num_rows($resultado) < 1) {
	                exit;
                 }
                 while($instit = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $instit['LOT_COD']; ?>"><?php echo $instit['LOT_NOME']; ?></option>
                  <?php } ?>
              </SELECT>
          </TD>
          <TD COLSPAN="2">
              <SELECT name="cargolotac">
                 <?php
                 $f = $dados['SOC_CARG_LOTAC'];
                 $carg = "-";
                 $resultCargLot = exeBD("select * from cargos where CAR_COD like '$f'");
                 if(mysqli_num_rows($resultCargLot) != 1){
                   $f;
                 }
                 $carg = mysqli_fetch_array($resultCargLot);?>

                 <OPTION VALUE="<?php echo $carg['CAR_COD'];?>"><?php echo $carg['CAR_NOME'];?></OPTION>
                 
                 <?php
                 $resultado = exeBD("select * from cargos");
                 if(mysqli_num_rows($resultado) < 1) {
	                exit;
                 }
                 while($cargo = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $cargo['CAR_COD']; ?>"><?php echo $cargo['CAR_NOME']; ?></option>
                 <?php } ?>
              </SELECT>
          </TD>
      </TR>
      </TABLE>
      <P align="center">
                <input type="submit" name="BTEnvia" value="Alterar documenta&ccedil;&atilde;o">
      </P>
      </form>

      <!----------------------------------FIM FORMULARIO-------------------------------------->

      <TABLE ALIGN="CENTER" BORDER="0">
      <form action="soc_altera_cad_sit.php" method="POST">
      <TR>
          <TD colspan="6" bgcolor="#FF7F00"><B>SITUA&Ccedil;&Atilde;O DO ASSOCIADO:</B></TD>
      </TR>
      <TR>
      <TD><input size="2" type="hidden" name="cod"  readonly="readonly" value="<?php echo $dados["SOC_COD"];?>" /></TD>
      </TR>
      <TR>
          <TD>Situa&ccedil;&atilde;o:</TD><TD>N. Port. Admiss&atilde;o:</TD><TD>Data Admiss&atilde;o:</TD><TD>N. Port. Aposetadoria:</TD><TD>Data Aposentadoria:</TD>
      </TR>
      <TR>
          <TD>
              <SELECT name="sit">
              <?php
                 $f = $dados["SOC_SITUAC"];
                 $sit = "-";
                 $resultSit = exeBD("select * from situacao where SIT_COD like '$f'");
                 if(mysqli_num_rows($resultSit) != 1){
                     $sit;
                 }
                 $sit = mysqli_fetch_array($resultSit);?>

                 <OPTION VALUE="<?php echo $sit["SIT_COD"];?>"><?php echo $sit["SIT_NOME"];?></OPTION>
                 
                 <?php
                 $resultad = exeBD("select * from situacao");
                 if(mysqli_num_rows($resultad) < 1) {
	                exit;
                 }
                 while($sit = mysqli_fetch_array($resultad)) { ?>
                 <option value="<?php echo $sit['SIT_COD'] ?>"><?php echo $sit['SIT_NOME'] ?></option>
                  <?php } ?>
              </SELECT>
          </TD>
          <TD><input type="text" size="20" name="portadmis" value="<?php echo $dados["SOC_PORT_ADMIS"];?>"></TD>
          <TD><input type="date" size="10" name="dtadmissao" value="<?php echo $dados["SOC_DTADMISSAO"];?>"></TD>
          <TD><input type="text" size="20" name="portaposent" value="<?php echo $dados["SOC_PORT_APOS"];?>"></TD>
          <TD><input type="date" size="10" name="dtaposent" value="<?php echo $dados["SOC_DTAPOSENT"];?>"></TD>
      </TR>
      <TR>
          <TD>N. Beneficio:<TD>Data Beneficio:</TD><TD>Data Falecimento:</TD>
      </TR>
      <TR>
          <TD><input type="text" size="10" name="numbenef" value="<?php echo $dados["SOC_NUM_BENEF"];?>"></TD>
          <TD><input type="date" size="10" name="dtbenef" value="<?php echo $dados["SOC_DTBENEF"];?>"></TD>
          <TD><input type="date" size="10" name="dtfalec" value="<?php echo $dados["SOC_DTFALEC"];?>"></TD>
      </TR>
      <TR>
          <TD>Obs:</TD>
      </TR>
      <TR>
           <TD COLSPAN="6">
               <input type="text" size="109" name="obs" value="<?php echo $dados["SOC_OBS"];?>"></TD>
           </TD>
      </TR>
   </TABLE>
   <BR>
   <P align="center">
        <input type="submit" name="BTEnvia" value="Alterar Situa&ccedil;&atilde;o ">
   </P>
   </form>

</DIV>
</body>
</html>
