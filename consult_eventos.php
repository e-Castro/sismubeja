<?php
include_once 'header.php';
include_once 'menu.php';
include_once 'funcoes.php';
?>
<!-- page content -->

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h2>Eventos Cadastrados</h2>
      </div>
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">

          </div>
        </div>
      </div>
      </form>
    </div>

    <div class="x_panel">
      <div class="x_title">
        <h2>Eventos</h2>
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
      <form action="consult_eventos.php" method="POST">
        <div class="x_content">
          <div class="row">
            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
              <label>Código</label>
            </div>

            <div class="col-md-5 col-sm-12 col-xs-12 form-group">
              <label>Evento</label>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
              <label>Principal Assunto em Pauta</label>
            </div>
          </div>

          <?php
          $result = exeBD("SELECT * FROM evento ORDER BY EVE_DATA ASC");
          while ($l = mysqli_fetch_array($result)) {
            ?>

            <div class="row">

              <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                <input type="text" name="cod" value="<?php echo $l['EVE_ID']; ?>" class="form-control" readonly="readonly">
              </div>

              <div class="col-md-5 col-sm-12 col-xs-12 form-group">
                <input type="text" value="<?php echo $l['EVE_NOME']; ?>" class="form-control" readonly="readonly">
              </div>

              <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                <input type="text" value="<?php echo $l['EVE_OBS']; ?>" class="form-control" readonly="readonly">
              </div>

              <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                <a href="rel_evento_pres.php?cod=<?php echo $l['EVE_ID']; ?>"><button type="button" class="btn btn-primary"><i class="fa fa-check"></i> Presenças</button></a>
                <a href="rel_evento_abonos.php?cod=<?php echo $l['EVE_ID']; ?>"><button type="button" class="btn btn-primary"><i class="fa fa-file-text-o"></i> Abonos</button></a>
              </div>
            </div>
          <?php } ?>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- /page content -->
<?php
include_once 'footer.php';
?>