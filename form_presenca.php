<?php
include_once 'header.php';
include_once 'menu.php';
include_once 'funcoes.php';

date_default_timezone_set('America/Sao_Paulo');

$data = date('Y-m-d');

if($data){
  $result = exeBD("SELECT * FROM `evento` WHERE `EVE_DATA` = '$data'");
  $evento = mysqli_fetch_array($result);
  $d = $evento['EVE_NOME'];
}else{
    echo "<script language='javascript' type='text/javascript'>alert('Não existe evento lançado para a data atual '.$data.'!');;window.location.href='form_evento.php';</script>";
}
?>
<!-- page content -->
<form action="backend/gravar.php?tb=presenca" method="POST" >
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h2>Cadastrar Presença</h2>
      </div>
    </div>

    <div class="x_panel">
      <div class="x_title">
        <h2>Evento - <?php echo $d;?></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12 form-group">
              <label>Código do Sócio: </label>
                <input  type="text" name="cod" class="form-control">
            </div>
            <br />
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-9">
              <button type="button" class="btn btn-primary">Cancelar</button>
              <button type="reset" class="btn btn-primary">Limpar</button>
              <button type="submit" class="btn btn-success">Gravar</button>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</form>
  <!-- /page content -->
  <?php
  include_once 'footer.php';
  ?>