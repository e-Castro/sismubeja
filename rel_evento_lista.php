<?php

session_start();

date_default_timezone_set('America/Sao_Paulo');
$d = date('d/m/Y H:i:s');

define ('FPDF_FONTPATH', 'font/');

require 'fpdf/fpdf.php';
require 'funcoes.php';

/*------- DATA/HORA -------*/

class myPDF extends FPDF {

    function header(){

        $usuario = $_SESSION['usuarioSession'];
        $id = $_GET['cod'];

        $consult = exeBD("SELECT EVE_NOME FROM evento WHERE EVE_ID=$id");
        $c = mysqli_fetch_array($consult);
        $evento = $c['EVE_NOME'];
               
        $d = date('d/m/Y H:i:s');
        $this ->setFont('arial', 'B', 10);
        $this ->Cell(185,5,utf8_decode('SISMUBEJA - Sindicato dos Servidores Públicos Mun. da Administração Direta e Indireta do Belo Jardim.'),0,1,'C');

        $this ->setFont('arial', 'B', 10);
        $this ->Cell(185,5,utf8_decode("Lista de Presença: $evento"),0,1,'C');
        $this ->setFont('arial', '', 8);
        $this ->Cell(90,7,utf8_decode('Telefone:(81) 3726-1296 - E-mail: contato@sismubeja.org.br'),0,0,'L');
        $this ->Cell(50,7,utf8_decode("Emitido por: $usuario"),0,0,'R');
        $this ->Cell(50,7,utf8_decode("Impresso em: $d"),0,1,'R');
        $this->Cell (0,1,"","B",1,"C");
        $this->Cell (0,1,"","",1,"C");

        $this ->setFont('arial', 'B', 8);
        $this->Cell(10,5,'ORDEM',0,0,'L');
        $this->Cell(15,5,'COD.',0,0,'C');
        $this->Cell(100,5,utf8_decode('NOME DO SÓCIO'),0,0,'L');
        $this->Cell(40,5,utf8_decode('SITUAÇÃO'),0,0,'C');
        $this->Cell(25,5,'CPF',0,1,'C');
        $this ->setFont('arial', '', 8);
        $this->Cell (0,1,"","B",1,"C");
    
    }

    function footer() {
        $this ->setFont('arial', '', 8);
        $this->SetY(-15);
        $this->Cell(0, 10, 'Page' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function headerTable() {

    }

    function viewTable(){

        $id = $_GET['cod'];

        $result = exeBD("SELECT * FROM presenca WHERE PRE_EVE_ID LIKE $id");
      
        $contador = 1;
        $cor = 0;

        while($s= mysqli_fetch_array($result)){
           
            //------localizar cargo------
            $idsocio = $s['PRE_SOC_COD'];
            $resultc = exeBD("SELECT * FROM sociosb WHERE SOC_COD LIKE $idsocio");
            $l = mysqli_fetch_array($resultc);

            //------localizar situação------
            $sit = $l['SOC_SITUAC'];
            $results = exeBD("SELECT * FROM situacao WHERE SIT_COD LIKE $sit");
            $situac = mysqli_fetch_array($results);
            $situacao = $situac['SIT_NOME'];
                        
            $this->SetFillColor(211,211,211);
            if($cor == 0){
                $cor = 1;
                $this->SetFont('arial','B',8);
                $this->Cell(10,5,$contador,0,0,'R');
                $this->SetFont('arial','',8);
                $this->Cell(15,5,$l['SOC_COD'],0,0,'C');
                $this->Cell(100,5,utf8_decode($l['SOC_NOME']),0,0,'L');
                $this->Cell(40,5,$situacao,0,0,'C');
                $this->Cell(25,5,$l['SOC_CPF'],0,1,'C');
            }else{
                $cor = 0;
                $this->SetFont('arial','B',8);
                $this->Cell(10,7,$contador,0,0,'R', true);
                $this->SetFont('arial','',8);
                $this->Cell(15,7,$l['SOC_COD'],0,0,'C', true);
                $this->Cell(100,7,utf8_decode($l['SOC_NOME']),0,0,'L', true);
                $this->Cell(40,7,$situacao,0,0,'C', true);
                $this->Cell(25,7,$l['SOC_CPF'],0,1,'C', true);
            }
           
        /*$id = $_GET['cod'];

        $result = exeBD("SELECT PRE.PRE_SOC_COD AS PRESOC, 
                                SOC.SOC_COD AS COD, 
                                SOC.SOC_NOME AS NOME, 
                                SOC.SOC_CPF AS CPF, 
                                SOC.SOC_SITUAC AS SIT 
                        FROM PRESENCA PRE INNER JOIN SOCIOSB SOC ON PRE.PRE_SOC_COD = SOC.SOC_COD
                        WHERE PRE.PRE_EVE_ID LIKE $id ORDER BY SOC.SOC_NOME ASC");

        $contador = 1;
        $cor = 0;

        while($l= mysqli_fetch_array($result)){
        
            //------localizar situação------
            $sit = $l['SIT'];
            $results = exeBD("SELECT * FROM situacao WHERE SIT_COD LIKE $sit");
            $situac = mysqli_fetch_array($results);
            $situacao = $situac['SIT_NOME'];
                        
            $this->SetFillColor(211,211,211);
            if($cor == 0){
                $cor = 1;
                $this->SetFont('arial','B',8);
                $this->Cell(10,5,$contador,0,0,'R');
                $this->SetFont('arial','',8);
                $this->Cell(15,5,$l['COD'],0,0,'C');
                $this->Cell(90,5,utf8_decode($l['NOME']),0,0,'L');
                $this->Cell(40,5,$situacao,0,0,'C');
                $this->Cell(35,5,$l['CPF'],0,1,'C');
            }else{
                $cor = 0;
                $this->SetFont('arial','B',8);
                $this->Cell(10,7,$contador,0,0,'R', true);
                $this->SetFont('arial','',8);
                $this->Cell(15,7,$l['COD'],0,0,'C', true);
                $this->Cell(90,7,utf8_decode($l['NOME']),0,0,'L', true);
                $this->Cell(40,7,$situacao,0,0,'C', true);
                $this->Cell(35,7,$l['CPF'],0,1,'C', true);
            }*/
        
            $contador = $contador + 1;
        }
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4', 0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();
?>
