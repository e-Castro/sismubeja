<?php
include_once 'header.php';
include_once 'menu.php';
?>
<!-- page content -->
<form action="backend/gravar.php?tb=bairros" method="POST" >
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h2>Cadastro Novo Bairro</h2>
      </div>

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
    </div>

    <div class="x_panel">
      <div class="x_title">
        <h2>Bairro</h2>
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
            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
              <label>Bairro:</label>
              <input type="text" name="nome" class="form-control">
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
              <label>Obs:</label>
              <input type="text" name="obs" class="form-control">
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