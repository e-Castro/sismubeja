<?php
include_once 'funcoes.php';
date_default_timezone_set('America/Sao_Paulo');
//include_once 'restrito.php';
$ip = getenv("REMOTE_HOST"); // captura o ip do visitante

//session_start(); //Inicia a sess�o
//$repres = $_SESSION['usuarioSession'];// recupera o nome que foi gravado na sess�o da p�gina anterior
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//PT" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8"/>
<title>..:: INTRANET - SISMUBEJA::..</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!---<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Archivo+Narrow:400,700" rel="stylesheet" type="text/css">-->
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body>
<?php
$cod  = $_GET['cod'];

$sql_soc = exeBD("SELECT * FROM sociosb WHERE SOC_COD LIKE $cod");
$socio = mysqli_fetch_array($sql_soc);

$foto = $socio['SOC_FOTO'];
$nome = $socio['SOC_NOME'];
$cpf  = $socio['SOC_CPF'];
$rg   = $socio['SOC_RG'];
$sit  = $socio['SOC_SITUAC'];
$mat  = $socio['SOC_MAT'];

if($sit == 3 || $sit == 5){
    echo "<h1 align='center'color='red'><span>Situação Cadastral: CANCELADO</span></h1>";
}else{
    echo "<h1 align='center'><span>Situação Cadastral: ATIVO - OK</span></h1>";
}
?>
        
<p align="center">
          <TABLE width="800" height="80" ALIGN='CENTER' background='images/carteira.jpg'>
          <TR>
               <TD>
                   <TABLE>
                          <TR>
                              <TD>
                                  <br>
                              </TD>
                          </TR>
                          <TR>
                              <TD> </TD><TD> </TD><TD> </TD><TD> </TD><TD> </TD><TD> </TD><TD> </TD>
                          </TR>

                          <TR>
                              <TD align="center" valign="top"><br><img src='images/img2.png'>
                                      <?php $sql = exeBD("SELECT * FROM sociosb WHERE SOC_COD LIKE $cod");
                                      // Exibe as informações de cada usuário
                                      while ($usuario = mysqli_fetch_array($sql)) {
	                                  // Exibir a foto
	                                  echo "<img src='fotos/".$usuario['SOC_FOTO']."' width='110' height='130' alt='Foto de exibição' /><br />";
                                      //echo "<img src='fotos/".$foto."' width='110' height='130' alt='Foto de exibição' /><br />";
                                      }?>
                                      <font size=1><b>C&Oacute;D: <?php echo $cod; ?></b></font>
                              </TD>

                              <TD COLSPAN=2>
                                  <TABLE>
                                         <TR><TD><br></TD></TR>
                                         
                                         <TR><TD><font face="Arial" size=1><B>NOME: </B><?php echo $nome; ?>.</font></TD></TR>
                                         <TR><TD><font face="Arial" size=1></font></TD></TR>
                                         <TR><TD></TD></TR>
                                         <TR><TD><font face="Arial" size=1><B>SECRETARIA:</B></font></TD></TR>
                                         <TR>
                                             <TD>
                                              <?php
                                                   $f = $socio['SOC_INSTIT'];
                                                   $inst="-";
                                                   $resultInst = exeBD("SELECT * FROM instituicao WHERE INS_COD LIKE '$f'");
                                                   if(mysqli_num_rows($resultInst) < 1) {
	                                                  $inst;
                                                   }
                                                   while($inst = mysqli_fetch_array($resultInst))
                                                   { ?>
                                                   <font face="Arial" size=1><?php echo $inst["INS_NOME"];} ?></font>
                                             </TD>
                                         </TR>
                                         <TR><TD><font face="Arial" size=1><B>PROFISS&Atilde;O:</B><?php echo $inst = $socio['SOC_PROFISSAO']; ?></font></TD></TR>
                                         <TR><TD><font face="Arial" size=1><B>MAT.:</B><?php echo $mat; ?></TD></TR>
                                         <TR><TD><font face="Arial" size=1><B>CPF:</B><?php echo $cpf; ?></TD></TR>
                                         <TR><TD></TD></TR>
                                         <TR><TD></TD></TR>
                                         <TR><TD></TD></TR>
                                         <TR><TD></TD></TR>
                                         <TR><TD></TD></TR>
                                         <TR><TD></TD></TR>
                                         <TR><TD><br><br><br><br></TD></TR>
                                  </TABLE>
                              
                          </TR>
                   </TABLE>
              </TD>
           </TR>


           </TABLE>
        </p>
</body>
</html>
