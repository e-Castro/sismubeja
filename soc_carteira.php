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
$nome = $_GET['nome'];
$cpf  = $_GET['cpf'];
$rg   = $_GET['rg'];
$sit  = $_GET['sit'];
$mat  = $_GET['mat'];

$sql_soc = exeBD("SELECT * FROM sociosb WHERE SOC_COD LIKE $cod");
$socio = mysqli_fetch_array($sql_soc);

?>

<h1 align='center'><span>Identidade Sindical - </span>Consulta de Socios</h1>

<p align="center"><input type="button" value="Voltar" onClick="history.go(-1)"/>  <input type="button" value="Imprimir" onclick="window.print()"/>
</p>
        
<p align="center">
          <TABLE width="790" height="80" ALIGN='CENTER' BACKGROUND='images/CARTEIRA-SINDICAL - Copia.jpg'>
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
                              <TD align="center" valign="top"><br><img src='images/img2.png'><?php $sql = exeBD("SELECT * FROM sociosb WHERE SOC_COD LIKE $cod");
                                      // Exibe as informações de cada usuário
                                      while ($usuario = mysqli_fetch_object($sql)) {
	                                  // Exibir a foto
	                                  echo "<img src='fotos/".$usuario->SOC_FOTO."' width='110' height='130' alt='Foto de exibição' /><br />";
                                      }?>
                                      <font size=1><b>C&Oacute;D: <?php echo $cod; ?></b></font>
                              </TD>

                              <TD COLSPAN=2>
                                  <TABLE>
                                         <TR><TD></TD></TR>
                                         
                                         <TR><TD><font face="Arial" size=1><B>NOME:</B></font></TD></TR>
                                         <TR><TD><font face="Arial" size=1><?php echo $nome; ?>.</font></TD></TR>
                                         <TR><TD></TD></TR>
                                         <TR><TD><font face="Arial" size=1><B>SECRETARIA:</B></font></TD></TR>
                                         <TR>
                                             <TD>
                                              <?php
                                                   $f = $socio['SOC_INSTIT'];
                                                   $inst="-";
                                                   $resultInst = exeBD("select * from instituicao where INS_COD like '$f'");
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
                                         <TR><TD ALIGN="CENTER">_____________________________</TD></TR>
                                         <TR><TD ALIGN="CENTER"><font face="Arial" size=1>------ <B>ASSINATURA DO SOCIO</B> --------</FONT></TD></TR>
                                         <TR><TD></TD></TR>
                                         <TR><TD></TD></TR>
                                         <TR><TD></TD></TR>
                                         <TR><TD></TD></TR>
                                         <TR><TD></TD></TR>
                                         <TR><TD></TD></TR>
                                         <TR><TD></TD></TR>
                                  </TABLE>
                              </TD>

                              <TD><img src='images/img1.png'</TD>
                              <TD colspan=2 valign="top"><br><br>
                              <?php
                              $bd = '16.938.090/0001-04';
                              $qr = 'qr_img050j/php/qr_img.php?';
                              $qr .= 'd=192.168.0.7/projetos/sismubeja/consult_socios.php?id='.$cod.'&';
                              $qr .= 'e=l&';
                              $qr .= 's=3&';
                              $qr .= 't=p';
                              ?>
                              <img src="<?php echo $qr; ?>" border='1'/>
                              </TD>
                              <TD ALIGN="CENTER" VALIGN="TOP"><BR><BR><BR>
                              <TABLE>
                                     <TR>
                                         <TD><B>DATA DA EXPEDI&Ccedil;&Atilde;O</B></TD>
                                     </TR>
                                     <TR>
                                         <TD><B><?PHP echo $data = date("d/m/Y");?></B></TD>
                                     </TR>
                              </TABLE>
                              </TD>
                          </TR>
                   </TABLE>
              </TD>
           </TR>


           </TABLE>
        </p>
</body>
</html>