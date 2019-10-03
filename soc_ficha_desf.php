<?php
include_once 'funcoes.php';
date_default_timezone_set('America/Sao_Paulo');
//include_once 'restrito.php';
//$ip = getenv("REMOTE_HOST"); // captura o ip do visitante

//session_start(); //Inicia a sess�o
//$repres = $_SESSION['usuarioSession'];// recupera o nome que foi gravado na sess�o da p�gina anterior
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//PT" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

    <?php

    $cod1 = $_GET['senha'];

    $sql = exeBD("SELECT * FROM sociosb WHERE SOC_COD LIKE $cod1");


    if (mysqli_num_rows($sql) <= 0) {
        echo "<script language='javascript' type='text/javascript'>alert('Socio nao localizado');window.location.href='soc_localizar.php';</script>";
        die();
    }

    // Exibe as informações de cada usuário
    $dados = mysqli_fetch_array($sql);

    $cod   = $dados['SOC_COD'];
    $data  = date('Y-m-d H:i');
    $nome  = $dados['SOC_NOME'];
    $prot  = '1245';
    $datav = date('Y-m-d', strtotime("+51 day"));
    $cpf   = $dados['SOC_CPF'];
    $rg    = $dados['SOC_RG'];
    $sit   = $dados['SOC_SITUAC'];
    $mat   = $dados['SOC_MAT'];

    //echo "<p align='center'><a href=\"gerar-prot.php? cod=$cod&data=$data&nome=$nome&prot=$prot&datav=$datav\">[ Gerar Protocolo ]</a>";
    //echo "<a href=\"soc_carteira.php? cod=$cod&nome=$nome&cpf=$cpf&rg=$rg&sit=$sit&mat=$mat\">[ Identidade Sindical ]</a></p>";
    ?>

    <TABLE TABLE width="800" ALIGN="CENTER" BORDER="0">
        <TR>
            <TD colspan="2" align='right'>
                <?php // Array com os meses do ano
                $meses = array(
                    '01' => 'Janeiro',
                    '02' => 'Fevereiro',
                    '03' => 'Mar�o',
                    '04' => 'Abril',
                    '05' => 'Maio',
                    '06' => 'Junho',
                    '07' => 'Julho',
                    '08' => 'Agosto',
                    '09' => 'Setembro',
                    '10' => 'Outubro',
                    '11' => 'Novembro',
                    '12' => 'Dezembro'
                );
                // Array com os dias da semana
                $diasemana = array('Domingo', 'Segunda-feira', 'Ter&ccedil;a-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sabado');

                // Aqui podemos usar a data atual ou qualquer outra data no formato Ano-m�s-dia (2014-02-28)
                $data2 = date('Y-m-d');

                // Varivel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
                $diasemana_numero = date('w', strtotime($data2));

                ?>
            </TD>
        </tr>
    </TABLE>
    <table width='800' border=0px font size=5 align='center'>
        <tr align="left">
            <td>
                <img src="images/cabecalhonet.png">
            </td>
        </tr>
        <tr align="center">
            <td>
                <br>
            </td>
        </tr>
        <tr align="center">
            <td><BR>
                <b>&Agrave; Secretaria Municipal de Administra&ccedil;&atilde;o de Belo Jardim</b>
                <BR></td>
        </tr>
        <tr align="center">
            <td>
                <br>
            </td>
        </tr>
        <tr align="right">
            <td>
                <b>AUTORIZA&Ccedil;&Atilde;O COD. N&ordm;: <?php echo $dados["SOC_COD"]; ?></b>
                <BR></td>
        </tr>
        <tr align="center">
            <td>
                <br>
            </td>
        </tr>
        <tr align="center">
            <td>
                <p align="justify">Eu, <?php echo $dados["SOC_NOME"]; ?>, Servidor Público de BELO JARDIM/PE, Matr&iacute;cula N&ordm;: <?php echo $dados["SOC_MAT"]; ?>
                    , RG: <?php echo $dados["SOC_RG"]; ?>, CPF: <?php echo $dados["SOC_CPF"]; ?>, telefone: <?php echo $dados["SOC_CEL"]; ?> venho pelo presente solicitar
                    a minha desfiliação do SINDICATO DOS SERVIDORES PUBLICOS MUNICIPAIS DE BELO JARDIM.</p>
                <BR>
            </td>

        </tr>
    </table>
    <TABLE TABLE width="800" ALIGN="CENTER" BORDER="0">
        <TR>
            <TD colspan="2" align='right'> <?php // Array com os meses do ano
                                            echo "<b>Belo Jardim - " . $diasemana[$diasemana_numero] . ", " . date('d') . " de " . $meses[date('m')] . " de 20" . date('y'); ?>.</b>
            </TD>
        </TR>
        <TR>
            <TD><BR><BR></TD>
            <TD></TD>
        </TR>
        <TR align='center'>
            <TD align='center'>______________________________</TD>
            <TD align='center'>________________________________</TD>
        </TR>
        <TR align='center'>
            <TD align='center'><b>Assinatura Associado</b></TD>
            <TD align='center'><b>Representante SISMUBEJA</b></TD>
        </TR>
        <TR>
            <TD></TD>
            <TD></TD>
            <TD><br></TD>
            <TD></TD>
        </TR>
        <TR align='center'>
            <TD colspan="2" align='center'>
                <p font size="8">Rua Josebias Alves, 44 - Edson Mororo Moura - CEP: 55150-000 | Belo Jardim-PE - Fone (81) 3726-1296 | E-mail: contato@sismubeja.org.br<p>
            </td>
        </TR>
        <TR>
            <TD colspan="2" align="center">
                <BR>
                ---------------------------------------------------------------------------------------------------------------------------------------------------
            </TD>
        </TR>
    </TABLE>
</body>

</html>