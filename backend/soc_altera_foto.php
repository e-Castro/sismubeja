<?php

include_once '../funcoes.php';

// variaveis recebidas do formulario de cadastro

$cod         = $_POST['cod2'];
$foto        = $_FILES["foto"];

    	// Se a foto estiver sido selecionada
	    if (!empty($foto["name"])) {

		// Largura maxima em pixels
		$largura = 17;
		// Altura maxima em pixels
		$altura = 28;
		// Tamanho maximo do arquivo em bytes
		$tamanho = 215040;

		$error = array();

    	// Verifica se o arquivo e uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
     	   $error[1] = "Isso nao e uma imagem.";
   	 	}

		// Pega as dimensoes da imagem
		//$dimensoes = getimagesize($foto["tmp_name"]);
		$dimensoes = file_get_contents($foto['tmp_name']);

		// Verifica se a largura da imagem e maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem nao deve ultrapassar ".$largura." pixels";
		}

		// Verifica se a altura da imagem e maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem nao deve ultrapassar ".$altura." pixels";
		}

		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no maximo 210KB ou ".$tamanho." bytes";
		}

		// Se nao houver nenhum erro
		if (count($error) == 0) {

			// Pega extensao da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

        	// Gera um nome unico para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        	// Caminho de onde ficara a imagem
        	$caminho_imagem = "../fotos/" . $nome_imagem;

			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
        }

		// Se houver mensagens de erro, exibe-as
        if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro . "<br/>";
			}
		}
        else
        {
            $insert = exeBD("UPDATE sociosb SET SOC_FOTO='".$nome_imagem."' WHERE SOC_COD LIKE $cod"); //faz o upload da foto no cadastro

            if($insert)
	        {
               echo"<script language='javascript' type='text/javascript'>alert('Foto alterado com sucesso!');window.location.href='../consult_socios.php?id=$cod'</script>";
	        }
		    else
		    {
		       echo"<script language='javascript' type='text/javascript'>alert('N�o foi poss&iacute;vel alterar esse Socio! ERRO 12052017');window.location.href='../consult_socios.php?id=$cod''</script>";
     	    }
		}
		}
?>
