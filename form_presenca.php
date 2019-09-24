<?php
include_once 'header.php';
include_once 'menu.php';
include_once 'funcoes.php';

date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d');

$tipo = 0;
$d = '';

if ($data) {
  $result = exeBD("SELECT * FROM `evento` WHERE `EVE_DATA` = '$data'");
  $row = mysqli_fetch_array($result);

  if ($row == false) {
    $d = 'Não existe evento lançado para a data atual!';
  } else {
    $result = exeBD("SELECT * FROM `evento` WHERE `EVE_DATA` = '$data'");
    $evento = mysqli_fetch_array($result);
    $d = $evento['EVE_NOME'];
    $tipo = 1;
  }
}
?>
<!-- page content -->
<form action="backend/gravar.php?tb=presenca" method="POST">
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h2>Cadastrar Presença</h2>
        </div>
      </div>

      <div class="x_panel">
        <div class="x_title">
          <h2>Evento - <?php echo $d . ' - ' . ConverteData($data); ?></h2>
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
          <?php if ($tipo == 1) { ?>
            <div class="row">
              <div class="col-md-5 col-sm-12 col-xs-12 form-group">
                <label>Código do Sócio: </label>
                <input type="text" name="cod" class="form-control">
              </div>
              <br />
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
            <div class="col-md-6 col-sm-12 col-xs-12">
              <button type="reset" class="btn btn-success"><i class="fa fa-eraser"></i> Limpar</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-clipboard"></i> Gravar</button>
            </div>
            </div>
          <?php } ?>
        </div>
      </div>
   </form>
      <div class="x_panel">
        <div class="x_title">
          <h2>Presenças confirmadas</h2>
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
            <div class="col-xs-2 form-group"><strong>Matrícula</strong></div>
            <div class="col-xs-5 form-group"><strong>Sócio Nome</strong></div>
            <div class="col-xs-5 form-group"><strong>Cargo</strong></div>
          </div>

          <form action='alu_altera.php?id=<?php echo $id_aluno; ?>&pagina=0' method='POST'>
          <?php   
          $result = exeBD("SELECT soc.SOC_COD as cod, soc.SOC_MAT as id, soc.SOC_NOME as nome, soc.SOC_PROFISSAO as cargo
            FROM sociosb soc 
            INNER JOIN presenca as pre ON soc.SOC_COD = pre.PRE_SOC_COD
            INNER JOIN evento as ev ON pre.PRE_EVE_ID = ev.EVE_ID
              WHERE ev.EVE_DATA = '$data'
              ORDER BY soc.SOC_COD ASC;");

          if($result == true){  
          while ($l = mysqli_fetch_array($result)) {
            $cod = isset($l["cod"]) ? $l["cod"] : '';
            $id = isset($l["id"]) ? $l["id"] : '';
            $nome = isset($l["nome"]) ? $l["nome"] : '';
            $cargo = isset($l["cargo"]) ? $l["cargo"] : '';
            ?>
              <div class="row">
                <div class="col-xs-2 form-group">
                  <input type="text" class="form-control" name="mat" value="<?php echo $id; ?>" readonly="readonly">
                </div>
                <div class="col-xs-5 form-group">
                  <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>" readonly="readonly">
                </div>
                <div class="col-xs-3 form-group">
                  <input type="text" class="form-control" name="cargo" value="<?php echo $cargo; ?>" readonly="readonly">
                </div>
                <div class="col-xs-2 form-group">
                  <a href="backend/confirmar_excluir.php?tabela=presenca&dado=<?php echo $cod; ?>">
                      <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> Cancelar</button>
                  </a>
                </div>
              </div>
            <?php }}?>
          </form>
      </div>
    </div>
  </div>
</div>
      
  <!-- /page content -->
  <?php
  include_once 'footer.php';
  ?>