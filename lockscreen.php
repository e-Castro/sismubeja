<?php
session_start();

include_once 'funcoes.php';
include_once 'restrito.php';

$user   = $_SESSION['usuarioSession'];

$result = exeBD("SELECT * from USUARIOS where USU_LOGIN = '$user'");
$dados  = mysqli_fetch_array($result);

$apelido  = $dados['USU_LOGIN'];
$email    = $dados['USU_EMAIL'];
$cod      = $dados['USU_SOC_COD'];

$results = exeBD("SELECT * from sociosb where SOC_COD = $COD");
$d  = mysqli_fetch_array($results);

$nome     = $d['SOC_NOME'];
$filiacao = $d['SOC_DTCADASTRO'];
$foto     = $d['SOC_FOTO'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aço Coelho | Logout</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition lockscreen" style="display: flex; flex-direction: column; justify-content: space-between; background-image: url('images/logo.jpg'); background-size: 100% 100%;">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="#"><b><img src="images/aco-logo.png"></b></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name text-center" style="color: silver"><b>Renovar sessão: </b><?php echo $user;?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="images/usu.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form action="reativar_login.php" class="lockscreen-credentials" method="POST">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="password" name="senha">
        <div class="input-group-btn">
          <button type="submit" class="btn" name="entrar"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->
  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center" style="color: silver">
    Enter com sua senha para reativar sua sessão
  </div>
  <div class="text-center">
    <a href="logout.php">Ou entre como um usuário diferente</a>
  </div>
  <div class="lockscreen-footer text-center" style="color: honeydew">
    Copyright &copy; 2018 <b><a href="http://www.ecastro.com.br">eCastro</a></b><br>
    Todos os direitos reservados
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>