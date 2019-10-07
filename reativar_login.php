<?php
include_once 'funcoes.php';

session_start();

$login = $_SESSION['usuarioSession'];
$senha = $_POST['senha'];
$entrar= $_POST['entrar'];

echo $senha.$login;

    if (isset($entrar))
    {

       $verifica = exeBD("SELECT * FROM USUARIOS WHERE USU_LOGIN = '$login' AND USU_SENHA = '$senha'") or die("erro ao selecionar");

       if (mysqli_num_rows($verifica)<=0)
       {
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='lockscreen.php';</script>";
          die();
       }
       else
       {
          header("Location: home.php");
          //echo"<script language='javascript' type='text/javascript'>alert('Acesso Liberado');window.location.href='principal.php';</script>";
          //die();
       }
    }
?>
