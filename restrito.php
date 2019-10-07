<?php
if(!isset($_SESSION['usuarioSession'])):
	echo 'Para ter acesso a esta pagina e necessario logar-se. <a href="index.php"> Entrar no sistema</a>.';
	die;
endif;
?>
