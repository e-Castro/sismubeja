<?php

include_once 'funcoes.php';

date_default_timezone_set('America/Sao_Paulo');

$data = date('Y-m-d');

$tabela = $_GET['tb'];

if($tabela == 'usuarios'){
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $socio = $_POST['codsocio'];
    $nivel = $_POST['nivel'];
    $obs   = $_POST['obs'];

    $gravar = exeBD("INSERT INTO `usuarios` (`USU_COD`, `USU_LOGIN`, `USU_SENHA`, `USU_SOC_COD`, `USU_OBS`, `USU_TIPO`) VALUES (DEFAULT,'$login','$senha',$socio,'$obs','$nivel')");

    if($gravar){
        echo "<script language='javascript' type='text/javascript'>alert('Novo Usuário - gravado com sucesso!');window.location.href='../form_usuarios.php';</script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>alert('Erro de comunicação com o Banco de Dados!');window.location.href='../form_usuarios.php';</script>";
    }
}else if($tabela == 'cargos'){
    $cbo   = $_POST['cbo'];
    $cargo = $_POST['cargo'];
    $obs   = $_POST['obs'];

    $gravar = exeBD("INSERT INTO `$tabela` (`CAR_ID`, `CAR_COD`, `CAR_NOME`, `CAR_OBS`) VALUES (DEFAULT,'$cbo','$cargo','$obs')");

    if($gravar){
        echo "<script language='javascript' type='text/javascript'>alert('Novo Cargo: $cargo - gravado com sucesso!');window.location.href='../form_cargos.php';</script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>alert('Erro de comunicação com o Banco de Dados!');window.location.href='../form_cargos.php';</script>";
    }
}else if($tabela == 'bairros'){
    $nome = $_POST['nome'];
    $obs   = $_POST['obs'];

    $gravar = exeBD("INSERT INTO `$tabela` (`BAI_COD`, `BAI_NOME`, `BAI_OBS`) VALUES (DEFAULT,'$nome','$obs')");

    if($gravar){
        echo "<script language='javascript' type='text/javascript'>alert('Novo Bairro: $nome - gravado com sucesso!');window.location.href='../form_bairros.php';</script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>alert('Erro de comunicação com o Banco de Dados!');window.location.href='../form_bairros.php';</script>";
    }
}else if($tabela == 'distrito'){
    $nome = $_POST['nome'];
    $obs   = $_POST['obs'];

    $gravar = exeBD("INSERT INTO `$tabela` (`DIS_COD`, `DIS_NOME`, `DIS_OBS`) VALUES (DEFAULT,'$nome','$obs')");

    if($gravar){
        echo "<script language='javascript' type='text/javascript'>alert('Novo Distrito: $nome - gravado com sucesso!');window.location.href='../form_distritos.php';</script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>alert('Erro de comunicação com o Banco de Dados!');window.location.href='../form_distritos.php';</script>";
    }
}else if($tabela == 'situacao'){
    $nome = $_POST['nome'];
    $obs   = $_POST['obs'];

    $gravar = exeBD("INSERT INTO `$tabela` (`SIT_COD`, `SIT_NOME`, `SIT_OBS`) VALUES (DEFAULT,'$nome','$obs')");

    if($gravar){
        echo "<script language='javascript' type='text/javascript'>alert('Novo Situação: $nome - gravado com sucesso!');window.location.href='../form_situacao.php';</script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>alert('Erro de comunicação com o Banco de Dados!');window.location.href='../form_situacao.php';</script>";
    }
}else if($tabela == 'instituicao'){
    $cod    = $_POST['cod'];
    $nome   = $_POST['nome'];
    $end    = $_POST['end'];
    $bairro = $_POST['bairro'];
    $cep    = $_POST['cep'];
    $cidade = $_POST['cidade']; 
    $distrito = $_POST['distrito'];
    $uf     = $_POST['uf'];
    $tel = $_POST['tel'];
    $dfund = $_POST['dfund'];
    $diretor = $_POST['diretor'];
    $obs    = $_POST['obs'];

    $gravar = exeBD("INSERT INTO `instituicao`(`INS_ID`, `INS_COD`, `INS_NOME`, `INS_END`, `INS_BAIRRO`, `INS_CEP`, `INS_CIDADE`, `INS_DISTRITO`, `INS_UF`, `INS_TEL`, 
    `INS_DTFUNDAC`, `INS_DIRETOR`, `INS_OBS`) VALUES (DEFAULT,'$cod','$nome','$end','$bairro','$cep','$cidade','$distrito','$uf','$tel','$dfund','$diretor','$obs')");

    if($gravar){
        echo "<script language='javascript' type='text/javascript'>alert('Nova Instituição: $nome - gravado com sucesso!');window.location.href='../form_instituicao.php';</script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>alert('Erro de comunicação com o Banco de Dados!');window.location.href='../form_instituicao.php';</script>";
    }
}else if($tabela == 'lotacao'){
    $cod   = $_POST['cod'];
    $nome = $_POST['nome'];
    $obs   = $_POST['obs'];

    $gravar = exeBD("INSERT INTO `$tabela` (`LOT_ID`,`LOT_COD`, `LOT_NOME`, `LOT_OBS`) VALUES (DEFAULT,'$cod','$nome','$obs')");

    if($gravar){
        echo "<script language='javascript' type='text/javascript'>alert('Nova Lotação: $nome - gravado com sucesso!');window.location.href='../form_lotacao.php';</script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>alert('Erro de comunicação com o Banco de Dados!');window.location.href='../form_lotacao.php';</script>";
    }
}else if($tabela == 'evento'){
    $data   = $_POST['data'];
    $nome = $_POST['nome'];
    $obs   = $_POST['obs'];
    $d = ConverteData($data);

    $gravar = exeBD("INSERT INTO `evento`(`EVE_ID`, `EVE_DATA`, `EVE_NOME`, `EVE_OBS`) VALUES (DEFAULT,'$data','$nome','$obs')");
    
    if($gravar != ''){
        
        $result = exeBD("SELECT * FROM `evento` WHERE `EVE_DATA` = '$data'");
        $dados = mysqli_fetch_array($result);
       
        $id = $dados['EVE_ID'];
    
        echo "<script language='javascript' type='text/javascript'>alert('Novo Evento: $nome - gravado com sucesso!');window.location.href='../form_presenca.php?id=$id';</script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>alert('Erro de comunicação $data com o Banco de Dados!');window.location.href='../form_evento.php';</script>";
    }
}else if($tabela == 'presenca'){

    $socio = $_POST['cod'];

    $result = exeBD("SELECT * FROM `evento` WHERE EVE_DATA LIKE '$data%'");
    $dados = mysqli_fetch_array($result);

    $evento = $dados['EVE_ID'];

    $gravar = exeBD("INSERT INTO `$tabela` (`PRE_ID`,`PRE_EVE_ID`, `PRE_SOC_COD`) VALUES (DEFAULT,'$evento','$socio')");

    if($gravar){
        echo "<script language='javascript' type='text/javascript'>alert('Presença - gravado com sucesso!');window.location.href='../form_presenca.php';</script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>alert('Erro de comunicação com o Banco de Dados!');window.location.href='../form_presenca.php';</script>";
    }
}

?>