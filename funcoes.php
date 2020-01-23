<?php
//Define informações locais 
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

function exeBD($query){
   $con = mysqli_connect("localhost","root","","u247783955_sism") or die("0;<center><br>Banco de dados indisponível.</center>");
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
    $pdo = new PDO("mysql:host=localhost;dbname=u247783955_sism", 'root', '');
     
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
function dataExtenso(){
	echo strftime('%A, %d de %B de %Y', strtotime('today'));
}
function dataPromissoria($data2){
	// Array com os meses do ano
	$meses = array(
		'01' => 'Janeiro',
		'02' => 'Fevereiro',
		'03' => 'Março',
		'04' => 'Abril',
		'05' => 'Maio',
		'06' => 'Junho',
		'07' => 'Julho',
		'08' => 'Agosto',
		'09' => 'Setembro',
		'10' => 'Outubro',
		'11' => 'Novembro',
		'12' => 'Dezembro'
	);
	// Array com os dias da semana
	$diasemana = array('','um', 'dois', 'três', 'quatro', 'cinco', 'seis', 'sete','oito', 'nove','dez', 'onze', 'doze', 
	'treze', 'quatorze', 'quinze', 'dezeseis', 'dezessete', 'dezoito','dezenove','vinte','vinte e um','vinte e dois',
	'vinte e três','vinte e quatro','vinte e cinco','vinte e seis','vinte e sete','vinte e oito','vinte e none','trinta',
	'trinta e um');
	// Array com os anos
	$ano_nome = array('','','','','','','','','','','','','','','','','','','','','vinte','vinte e um','vinte e dois',
	'vinte e três','vinte e quatro','vinte e cinco','vinte e seis','vinte e sete','vinte e oito','vinte e nove','trinta',
	'trinta e um');
	// Aqui podemos usar a data atual ou qualquer outra data no formato Ano-m�s-dia (2014-02-28)
	//$data2 = Date('Y-m-d');
	$data2 = ConverteData($data2);

	// Varivel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
	$diasemana_numero = date('d', strtotime($data2));
	//
	$ano_numero = date('y', strtotime($data2));
	
	return "<b>Ao(s) " . $diasemana[$diasemana_numero] . " dia(s) do mês de " . 
	$meses[date('m', strtotime($data2))] . " de dois mil e " . $ano_nome[$ano_numero];

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

// Essa função complementa a função abaixo (valor_por_extenso).
function removerFormatacaoNumero( $strNumero )
    {

        $strNumero = trim( str_replace( "R$", null, $strNumero ) );

        $vetVirgula = explode( ",", $strNumero );
        if ( count( $vetVirgula ) == 1 )
        {
            $acentos = array(".");
            $resultado = str_replace( $acentos, "", $strNumero );
            return $resultado;
        }
        else if ( count( $vetVirgula ) != 2 )
        {
            return $strNumero;
        }

        $strNumero = $vetVirgula[0];
        $strDecimal = mb_substr( $vetVirgula[1], 0, 2 );

        $acentos = array(".");
        $resultado = str_replace( $acentos, "", $strNumero );
        $resultado = $resultado . "." . $strDecimal;

        return $resultado;

    }
function valor_por_extenso( $valor = 0, $bolExibirMoeda = true, $bolPalavraFeminina = false )
    {

        $valor = removerFormatacaoNumero( $valor );

        $singular = null;
        $plural = null;

        if ( $bolExibirMoeda )
        {
            $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }
        else
        {
            $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("", "", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }

        $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
        $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
        $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
        $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");

        if ( $bolPalavraFeminina )
        {
            if ($valor == 1)
                $u = array("", "uma", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
            else
                $u = array("", "um", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");

            $c = array("", "cem", "duzentas", "trezentas", "quatrocentas","quinhentas", "seiscentas", "setecentas", "oitocentas", "novecentas");
        }

        $z = 0;

        $valor = number_format( $valor, 2, ".", "." );
        $inteiro = explode( ".", $valor );

        for ( $i = 0; $i < count( $inteiro ); $i++ )
            for ( $ii = mb_strlen( $inteiro[$i] ); $ii < 3; $ii++ )
                $inteiro[$i] = "0" . $inteiro[$i];

        // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
        $rt = null;
        $fim = count( $inteiro ) - ($inteiro[count( $inteiro ) - 1] > 0 ? 1 : 2);
        for ( $i = 0; $i < count( $inteiro ); $i++ )
        {
            $valor = $inteiro[$i];
            $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
            $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
            $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

            $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
            $t = count( $inteiro ) - 1 - $i;
            $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
            if ( $valor == "000")
                $z++;
            elseif ( $z > 0 )
                $z--;

            if ( ($t == 1) && ($z > 0) && ($inteiro[0] > 0) )
                $r .= ( ($z > 1) ? " de " : "") . $plural[$t];

            if ( $r )
                $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
        }

        $rt = mb_substr( $rt, 1 );

        return($rt ? trim( $rt ) : "zero");

	}
	
	function calcularParcelas($nParcelas, $dataPrimeiraParcela = null)
	{
		if($dataPrimeiraParcela != null){
		  $dataPrimeiraParcela = explode( "/",$dataPrimeiraParcela);
		  $dia = $dataPrimeiraParcela[0];
		  $mes = $dataPrimeiraParcela[1];
		  $ano = $dataPrimeiraParcela[2];
		} else {
		  $dia = date("d");
		  $mes = date("m");
		  $ano = date("Y");
		}
	   
		for($x = 0; $x < $nParcelas; $x++){
		  echo date("d/m/Y",strtotime("+".$x." month",mktime(0, 0, 0,$mes,$dia,$ano))),"<br/>";
		}
	}
	   
	  /*echo "Calcula as parcela a partir de hoje<br/>";
	  calcularParcelas(5);
	  echo "<br/><br/>";
	  echo "Calcula as parcela a partir de uma data qualquer<br/>";
	  calcularParcelas(5, "31/08/2011");*/
?>

