<?php

session_start();

date_default_timezone_set('America/Sao_Paulo');
$d = date('d/m/Y H:i:s');

define ('FPDF_FONTPATH', 'font/');

require '../fpdf/fpdf.php';
require '../backend/funcoes.php';

/*------- DATA/HORA -------*/

class myPDF extends FPDF {

    function header(){
        $usuario = $_SESSION['usuarioSession'];
       
        $d = date('d/m/Y H:i:s');
        $this ->setFont('arial', 'B', 14);
        $this ->Cell(278,5,utf8_decode('SISMUBEJA - Sindicato dos Servidores Públicos Mun. da Administração Direta e Indireta do Belo Jardim.'),0,1,'L');

        $this ->setFont('arial', 'B', 10);
        $this ->Cell(278,5,utf8_decode("Relátorio: Sócios Cancelados/Falecidos/Licenciados/Afastados"),0,1,'C');
        $this ->setFont('arial', '', 8);
        $this ->Cell(178,5,utf8_decode('Telefone:(81) 3726-1296 - E-mail: contato@sismubeja.org.br'),0,0,'L');
        $this ->Cell(50,5,utf8_decode("Emitido por: $usuario"),0,0,'R');
        $this ->Cell(50,5,utf8_decode("Impresso em: $d"),0,1,'R');
        $this->Cell (0,1,"","B",1,"C");
        $this->Cell (0,1,"","",1,"C");

        $this ->setFont('arial', 'B', 8);
        $this->Cell(10,7,'ORDEM',0,0,'L');
        $this->Cell(15,7,'ID.',0,0,'C');
        $this->Cell(90,7,'NOME',0,0,'L');
        $this->Cell(45,7,utf8_decode('SECRETARIA'),0,0,'C');
        $this->Cell(40,7,utf8_decode('SITUAÇÃO'),0,0,'C');
        $this->Cell(50,7,'CARGO',0,0,'C');
        $this->Cell(25,7,'CPF',0,1,'C');
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

        $result = exeBD("SELECT * from sociosb WHERE SOC_SITUAC LIKE 3 || SOC_SITUAC LIKE 4 || SOC_SITUAC LIKE 5 || SOC_SITUAC LIKE 6 order by SOC_NOME asc");
      
        $contador = 0;
        $cor = 0;

        while($l = mysqli_fetch_array($result)){
            //------localizar secretaria------
            $ins = $l['SOC_INSTIT'];
            $instituicao = '';
            $resulti = exeBD("SELECT * FROM instituicao WHERE INS_COD LIKE '$ins'");
            $inst = mysqli_fetch_array($resulti);
            if($inst < 1){
                $instituicao = 'NÃO CADASTRADO';
            }else{
                $instituicao = $inst['INS_NOME'];
            }    
            //------localizar situação------
            $sit = $l['SOC_SITUAC'];
            $results = exeBD("SELECT * FROM situacao WHERE SIT_COD LIKE $sit");
            $situac = mysqli_fetch_array($results);
            $situacao = $situac['SIT_NOME'];
            //------localizar cargo------
            $car = $l['SOC_CARGO'];
            $cargo = '';
            $resultc = exeBD("SELECT * FROM cargos WHERE CAR_COD LIKE '$car'");
            $carg = mysqli_fetch_array($resultc);
            if($carg < 1){
                $cargo = 'NÃO CADASTRADO';
            }else{
                $cargo = $carg['CAR_NOME'];
            }    
            
            $this->SetFillColor(211,211,211);
            if($cor == 0){
                $cor = 1;
                $this->SetFont('arial','B',8);
                $this->Cell(10,7,$contador,0,0,'R');
                $this->SetFont('arial','',8);
                $this->Cell(15,7,$l['SOC_COD'],0,0,'R');
                $this->Cell(90,7,utf8_decode($l['SOC_NOME']),0,0,'L');
                $this->Cell(45,7,utf8_decode($instituicao),0,0,'C');
                $this->Cell(40,7,utf8_decode($situacao),0,0,'C');
                $this->Cell(50,7,utf8_decode($cargo),0,0,'C');
                $this->Cell(25,7,utf8_decode($l['SOC_CPF']),0,1,'C');
            }else{
                $cor = 0;
                $this->SetFont('arial','B',8);
                $this->Cell(10,7,$contador,0,0,'R',true);
                $this->SetFont('arial','',8);
                $this->Cell(15,7,$l['SOC_COD'],0,0,'R',true);
                $this->Cell(90,7,utf8_decode($l['SOC_NOME']),0,0,'L',true);
                $this->Cell(45,7,utf8_decode($instituicao),0,0,'C',true);
                $this->Cell(40,7,utf8_decode($situacao),0,0,'C',true);
                $this->Cell(50,7,utf8_decode($cargo),0,0,'C',true);
                $this->Cell(25,7,utf8_decode($l['SOC_CPF']),0,1,'C',true);
            }
           
            $contador = $contador + 1;
        }
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('R', 'A4', 0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();
?>
