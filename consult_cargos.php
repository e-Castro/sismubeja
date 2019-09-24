<?php
include_once 'header.php';
include_once 'menu.php';
?>
<!-- page content -->

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h2>Cadastro Novo Cargo</h2>
      </div>
      <form action="backend/gravar.php?tb=cargos" method="POST" >
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      </form>
    </div>
    <form action="backend/gravar.php?tb=cargos" method="POST">
    <div class="x_panel">
      <div class="x_title">
        <h2>Cargo</h2>
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

            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
              <label>CBO:</label>
              <input type="text" name="cbo" class="form-control">
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
              <label>Cargo:</label>
              <input type="text" name="cargo" class="form-control">
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
              <label>Obs:</label>
              <input type="text" name="obs" class="form-control">
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
      </div>
    </div>
    </form>

    <div class="x_panel">
      <div class="x_title">
        <h2>Cargo Cadastrados</h2>
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
          <?php 
          $result = exeBD("SELECT * FROM cargos ORDER BY CAR_NOME ASC");
          while($d = mysqli_fetch_array($result)){
          ?>
          <div class="row">

            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
              <input type="text" name="cbo" value="<?php echo $l['CAR_CBO']; ?>" class="form-control" readonly="readonly">
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
              <input type="text" name="cargo" class="form-control" readonly="readonly">
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                <button type="button" class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button>
            </div>
          </div>
          <?php } ?>
      </div>
    </div>
  </div>
</div>

  <!-- /page content -->
  <?php
  include_once 'footer.php';
  ?>