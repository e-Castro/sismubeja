<?php

function exeBD($query){
   $con = mysqli_connect("localhost","u435165814_prod","sismubeja","u435165814_prod") or die("0;<center><br>Banco de dados indisponível.</center>");
   $ar = mysqli_query($con,$query);
  return $ar;
   mysqli_close($con);
}
/*function exeBD($query){
   $con = mysqli_connect("localhost","u247783955_sism","Qwe15123002$","u247783955_sism") or die("<center><br>Banco de dados indisponível.</center>");
   $ar = mysqli_query($con,$query);
  return $ar;
   mysqli_close($con);
}*/

function exePDO($query){
   // PDO
    $pdo = new PDO("mysql:host=localhost;dbname=u435165814_prod", 'u435165814_prod', 'sismubeja');
     
    return $pdo;
}

function foto($cod){
   
   $res = exeBD("SELECT * FROM sociosb WHERE SOC_COD LIKE $cod");
   $dados = mysqli_fetch_array($res);
   $foto = $dados['SOC_FOTO'];

	return $foto;
}

function reais($valor){
	//return $valor;
	//$valor = str_replace(".","",$valor);
	$valor = str_replace(",",".",$valor);
	return number_format($valor, 2 ,"," , ".");
}

function ConverteData($data){
    if (strstr($data, "/")){
       $d = explode("/", $data);
       $rtdata = "$d[2]-$d[1]-$d[0]";
    }else{
       $d = explode("-",$data);
       $rtdata = "$d[2]/$d[1]/$d[0]";
    }
    return $rtdata;
}

function mascaraCPF($cpf){
	if(is_numeric($cpf)){
		if(strlen($cpf) == 11)
			return substr($cpf,0,3).'.'.substr($cpf,3,3).'.'.substr($cpf,6,3).'-'.substr($cpf,9,2);
		else
			return substr($cpf,0,2).'.'.substr($cpf,2,3).'.'.substr($cpf,5,3).'/'.substr($cpf,8,4).'-'.substr($cpf,12,2);
	}
	else
		return $cpf;
}

function geraCodigoBarra($numero){
	$fino = 1;
	$largo = 3;
	$altura = 50;
	
	$barcodes[0] = '00110';
	$barcodes[1] = '10001';
	$barcodes[2] = '01001';
	$barcodes[3] = '11000';
	$barcodes[4] = '00101';
	$barcodes[5] = '10100';
	$barcodes[6] = '01100';
	$barcodes[7] = '00011';
	$barcodes[8] = '10010';
	$barcodes[9] = '01010';
	
	for($f1 = 9; $f1 >= 0; $f1--){
		for($f2 = 9; $f2 >= 0; $f2--){
			$f = ($f1*10)+$f2;
			$texto = '';
			for($i = 1; $i < 6; $i++){
				$texto .= substr($barcodes[$f1], ($i-1), 1).substr($barcodes[$f2] ,($i-1), 1);
			}
			$barcodes[$f] = $texto;
		}
	}
	
	echo '<img src="images/p.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
	echo '<img src="images/b.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
	echo '<img src="images/p.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
	echo '<img src="images/b.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
	
	echo '<img ';
	
	$texto = $numero;
	
	if((strlen($texto) % 2) <> 0){
		$texto = '0'.$texto;
	}
	
	while(strlen($texto) > 0){
		$i = round(substr($texto, 0, 2));
		$texto = substr($texto, strlen($texto)-(strlen($texto)-2), (strlen($texto)-2));
		
		if(isset($barcodes[$i])){
			$f = $barcodes[$i];
		}
		
		for($i = 1; $i < 11; $i+=2){
			if(substr($f, ($i-1), 1) == '0'){
				  $f1 = $fino ;
			  }else{
				  $f1 = $largo ;
			  }
			  
			  echo 'src="images/p.gif" width="'.$f1.'" height="'.$altura.'" border="0">';
			  echo '<img ';
			  
			  if(substr($f, $i, 1) == '0'){
				$f2 = $fino ;
			}else{
				$f2 = $largo ;
			}
			
			echo 'src="img/b.gif" width="'.$f2.'" height="'.$altura.'" border="0">';
			echo '<img ';
		}
	}
	echo 'src="images/p.gif" width="'.$largo.'" height="'.$altura.'" border="0" />';
	echo '<img src="images/b.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
	echo '<img src="images/p.gif" width="1" height="'.$altura.'" border="0" />';
}
?>

