<?php
$imagem = 'imagens/imagem.jpg';
$nova_imagem = 'novas_imagens/novo_nome.jpg';

if ( @copy( $imagem, $nova_imagem ) ) {
    echo 'Arquivo copiado.';
} else {
    echo 'Arquivo não copiado.';
}
?>