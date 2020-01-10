<?php
include_once '../funcoes.php';
session_start();
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
$login = $_POST['login'];
$senha = $_POST['senha'];

    if (isset($login))
    {

       $verifica = exeBD("SELECT * FROM usuarios WHERE USU_LOGIN = '$login' AND USU_SENHA = '$senha'") or die("erro ao selecionar");

       if (mysqli_num_rows($verifica)<=0)
       {
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
          die();
       }
       else
       {
          $_SESSION['usuarioSession'] = $login;
          //header("Location: principal.html");
          echo"<script language='javascript' type='text/javascript'>alert('Acesso Liberado');window.location.href='../home.php';</script>";
          die();
       }
    }
?>
