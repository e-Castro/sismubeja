<?php

include_once 'funcoes.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aço Coelho | Recuperar Senha</title>
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

<body class="hold-transition lockscreen" style="display: flex; flex-direction: column; justify-content: space-between; background-image: url('images/index6.jpg'); background-size: 100% 100%;">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="#"><b><img src="images/aco-logo.png"></b></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name text-center" style="color: silver"><b>Recuperar senha de acesso</b></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="images/usu.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form action="backend/enviar.php" class="lockscreen-credentials" method="GET">
      <div class="input-group">
        <input type="email" class="form-control" placeholder="Informe email cadastrado" name="email">
        <div class="input-group-btn">
          <button type="submit" class="btn" name="entrar"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->
  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center" style="color: silver">
    Enter com o e-mail informado no cadastramento
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
