<!DOCTYPE html>
<?php

session_start();
include_once 'funcoes.php';
include_once 'restrito.php';
$usuario = $_SESSION['usuarioSession'];

$result = exeBD("SELECT * FROM usuarios WHERE USU_LOGIN LIKE '$usuario'");
$dados_user = mysqli_fetch_array($result);

$codsoc = $dados_user['USU_SOC_COD'];
$tipo = $dados_user['USU_TIPO'];
$fotop = $dados_user['USU_SOC_COD'];

?>
<html lang="pt-br">

<head>
  <!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   Meta, title, CSS, favicons, etc-->
  <?php header("Content-Type: text/html; charset=UTF-8");?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/logo.png" type="image/ico" />

  <title>Sismubejas</title>

  <!-- Bootstrap -->
  <link href="vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="vendors/font-awesome/css/font-awesome.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="vendors/jqvmap/dist/jqvmap.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="build/css/custom.css" rel="stylesheet">
</head>