<?php
include_once 'funcoes.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$tabela  = $_GET['tabela'];
$dado = $_GET['dado'];

    if (isset($tabela))
    {
        echo "<script language='javascript' type='text/javascript'>decisao = confirm('Confirmar Exclusão?');
            if(decisao)
            {
                window.location.href='excluir.php?tabela=$tabela&dado=$dado';   
            }
            else
            {
                window.location.href='../form_presenca.php';    
            }</script>";

    }

?>

