<?php

function exeBD($query){
       $con = mysqli_connect("localhost","root","","id2289417_sism") or die("0;<center><br>Banco de dados indispon�vel.</center>");
       $ar = mysqli_query($con,$query);
	   return $ar;
       mysqli_close($con);
}

function exePDO($query){
    $conexao = new PDO("pgsql:host=localhost;port=;dbname=sismubeja;user=root;password=");
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
  
    return $PDO;
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
?>

